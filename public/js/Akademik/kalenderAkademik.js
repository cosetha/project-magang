$(document).ready(function() {
  $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
  loadDataKalenderAkademik();
  //load data kalender Akademik
  function loadDataKalenderAkademik() {
      $('#datatable-kalender').load('/kalender/datatable', function() {
          var host = window.location.origin;
          $('#kalender-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: {
                  url: '/kalender/data',
                  type: 'GET'
              },
              columns: [
                  {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
                  {data: 'judul',name: 'judul'},
                  {data: 'semester',name: 'semester'},
                  {data: 'deskripsi',name: 'deskripsi'},
                  {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
              ]
          });
      });
  }

  //list semester
  $('body').on('click', '#btn-tambah-kalender', function(e) {
    e.preventDefault();
    $('#list-semester').empty();
    $("#list-semester").append('<option value=""> -- Pilih Semester -- </option>');
    $.ajax({
        type: 'GET',
        url: 'kalender/list-smt',
        contentType: false,
        processData: false,
        success: function(data) {
          $('#KalenderModal').modal('show');
          var smt = data.data;
          for (var i = 0; i < smt.length; i++) {
            // var val = i+1;
            $("#list-semester").append('<option value="'+smt[i].id+'"> '+ smt[i].semester +' </option>');
          }
        }
    });
  });

  //tambah kalenderAkademik
  $('body').on('submit', '#form-tambah-kalender', function(e) {
    e.preventDefault();
    var formData = new FormData();

    var namaKegiatan = $('input[name=nama-kegiatan]').val();
    var deskripsi = tinymce.get('deskripsi-kalender').getContent();
    var semester = $('#list-semester').children('option:selected').val();
    formData.append('nama_kegiatan', namaKegiatan);
    formData.append('deskripsi', deskripsi);
    formData.append('semester', semester);

    if(namaKegiatan == "" || deskripsi == "" || semester == "") {
      Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'Field tidak boleh kosong!',
          timer: 1200,
          showConfirmButton: false
      });
    } else {
      $.ajax({
          type: 'POST',
          url: 'kalender',
          data: formData,
          contentType: false,
          processData: false,
          success: function(data) {
            if(data.status == 'ok') {
              Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: 'Berhasil Menambahkan Kalender Akademik!',
                  timer: 1200,
                  showConfirmButton: false
              });
              $('#form-tambah-kalender').trigger('reset');
              $('#KalenderModal .close').click();
              loadDataKalenderAkademik();
            }
          }
      });
    }
  });

  //tampil edit kalender
  $('body').on('click', '.btn-edit-kalender', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      $('input[name=edit-id]').val(id);

      $('#list-semester-edit').empty();
      $('#list-semester-edit').append('<option value=""> -- Pilih Semester -- </option>');
      $.ajax({
          type: 'GET',
          url: 'kalender/list-smt',
          contentType: false,
          processData: false,
          success: function(data) {
            var smt = data.data;
            for (var i = 0; i < smt.length; i++) {
              $("#list-semester-edit").append('<option value="'+smt[i].id+'"> '+ smt[i].semester +' </option>');
            }
            $.ajax({
                type: 'GET',
                url: 'kalender/edit/' + id,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#editKalenderModal').modal('show');
                    $('#nama-kegiatan-edit').val(data.data.judul);
                    $('#list-semester-edit option[value="'+data.data.kode_semester+'"]').attr('selected','selected');
                    tinymce.get('deskripsi-kalender-edit').setContent(data.data.deskripsi);
                }
            });
          }
      });
  });

  //update kalender
  $('body').on('submit', '#form-edit-kalender', function(e) {
    e.preventDefault();
    var formData = new FormData();

    var namaKegiatan = $('input[name=nama-kegiatan-edit]').val();
    var deskripsi = tinymce.get('deskripsi-kalender-edit').getContent();
    var semester = $('#list-semester-edit').children('option:selected').val();
    var id = $('input[name=edit-id]').val();
    formData.append('nama_kegiatan', namaKegiatan);
    formData.append('deskripsi', deskripsi);
    formData.append('semester', semester);

    if(namaKegiatan == "" || deskripsi == "" || semester == "") {
      Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'Field tidak boleh kosong!',
          timer: 1200,
          showConfirmButton: false
      });
    } else {
      $.ajax({
          type: 'POST',
          url: 'kalender/update/' + id,
          data: formData,
          contentType: false,
          processData: false,
          success: function(data) {
            if(data.status == 'ok') {
              Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: 'Berhasil Menambahkan Kalender Akademik!',
                  timer: 1200,
                  showConfirmButton: false
              });
              $('#form-edit-kalender').trigger('reset');
              $('#editKalenderModal .close').click();
              loadDataKalenderAkademik();
            }
          }
      });
    }
  });

  //hapus kalender
  //hapus prestasi
  $('body').on('click', '.btn-delete-kalender', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('input[name=hapus-id]').val(id);
    $('#deleteKalenderModal').modal('show');
  });

  $('body').on('click', '#btn-confirm-kalender', function(e) {
    e.preventDefault();
    var id = $('input[name=hapus-id]').val();
    $.ajax({
      type: 'GET',
      url: 'kalender/delete/' + id,
      contentType: false,
      processData: false,
      success: function(data) {
        if(data.status == 'deleted') {
          Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              )
          $('#deleteKalenderModal').modal('hide');
          loadDataKalenderAkademik();
        }
      }
    });
  });

});
