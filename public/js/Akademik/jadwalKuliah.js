$(document).ready(function() {
  $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
  loadDataJadwalKuliah();
  //load data jadwalkuliah
  function loadDataJadwalKuliah() {
    AlertCount();
      $('#datatable-jadwal').load('/jadwal/datatable', function() {
          var host = window.location.origin;
          $('#jadwal-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: {
                  url: '/jadwal/data',
                  type: 'GET'
              },
              columns: [
                  {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
                  {data: 'nama_jadwal',name: 'nama_jadwal'},
                  {data: 'semester',name: 'semester'},
                  {data: 'nama_bk',name: 'nama_bk'},
                  {data: 'file_jadwal',name: 'file_jadwal'},
                  {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
              ]
          });
      });
  }

  //tampil smt dan bk
  $('body').on('click', '#btn-tambah-jadwal', function(e) {
    e.preventDefault();
    $('#list-bk').empty();
    $("#list-bk").append('<option value=""> -- Pilih Bidang Keahlian -- </option>');
    $('#list-semester').empty();
    $("#list-semester").append('<option value=""> -- Pilih Semester -- </option>');
    $.ajax({
        type: 'GET',
        url: 'jadwal/get-list',
        contentType: false,
        processData: false,
        success: function(data) {
          $('#JadwalModal').modal('show');
          var bk = data.bk;
          for (var i = 0; i < bk.length; i++) {
            $("#list-bk").append('<option value="'+bk[i].id+'"> '+ bk[i].nama_bk +' </option>');
          }
          var smt = data.semester;
          for (var i = 0; i < smt.length; i++) {
            $("#list-semester").append('<option value="'+smt[i].id+'"> '+ smt[i].semester +' </option>');
          }
        }
    });
  });

  //tambah jadwal
  $('body').on('submit', '#form-tambah-jadwal', function(e) {
    e.preventDefault();
    var formData = new FormData();

    var namaJadwal = $('input[name=nama-jadwal]').val();
    var semester = $('#list-semester').children('option:selected').val();
    var bk = $('#list-bk').children('option:selected').val();
    var file = $('#file-upload')[0].files[0];

    formData.append('nama', namaJadwal);
    formData.append('semester', semester);
    formData.append('bk', bk);
    formData.append('file', file);

    if(namaJadwal == "" || semester == "" || bk == "") {
      Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'Field tidak boleh kosong!',
          timer: 1200,
          showConfirmButton: false
      });
    } else if(file == null) {
      Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'File tidak boleh kosong!',
          timer: 1200,
          showConfirmButton: false
      });
    } else {
    $.ajax({
      type: 'POST',
      url: 'jadwal',
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
        if(data.status == "ok") {
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Berhasil Menambahkan Jadwal Kuliah!',
                timer: 1200,
                showConfirmButton: false
            });
            $('#form-tambah-jadwal').trigger('reset');
            $('#JadwalModal .close').click();
            loadDataJadwalKuliah();
        } else if(data.status == "validation.mimes"){
          Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Format dokumen harus doc,docx,pdf,xls,xlsx!',
              timer: 1200,
              showConfirmButton: false
          });
        } else if(data.status == "validation.max.file"){
          Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Ukuran file tidak boleh lebih 8 MB',
              timer: 1200,
              showConfirmButton: false
          });
        } else {
          Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Terjadi kesalahan! ' + data.status,
              timer: 1200,
              showConfirmButton: false
          });
        }

      }
    });
  }
  });

  //tampil edit jadwal
  $('body').on('click', '.btn-edit-jadwal', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      $('input[name=edit-id]').val(id);

      $('#list-bk-edit').empty();
      $('#list-bk-edit').append('<option value=""> -- Pilih Bidang Keahlian -- </option>');
      $('#list-semester-edit').empty();
      $('#list-semester-edit').append('<option value=""> -- Pilih Semester -- </option>');
      $('#file').empty();
      $.ajax({
          type: 'GET',
          url: 'jadwal/get-list',
          contentType: false,
          processData: false,
          success: function(data) {
            var bk = data.bk;
            for (var i = 0; i < bk.length; i++) {
              $("#list-bk-edit").append('<option value="'+bk[i].id+'"> '+ bk[i].nama_bk +' </option>');
            }
            var smt = data.semester;
            for (var i = 0; i < smt.length; i++) {
              $("#list-semester-edit").append('<option value="'+smt[i].id+'"> '+ smt[i].semester +' </option>');
            }
            $.ajax({
                type: 'GET',
                url: 'jadwal/edit/' + id,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#editJadwalModal').modal('show');
                    $('#nama-jadwal-edit').val(data.data.nama_jadwal);
                    $('#list-semester-edit option[value="'+data.data.kode_semester+'"]').attr('selected','selected');
                    $('#list-bk-edit option[value='+data.data.kode_bk+']').attr('selected','selected');
                    $('#file').append(data.data.file);
                    $('#file').attr('href', data.data.file);
                }
            });
          }
      });
  });

  //update jadwal
  $('body').on('submit', '#form-edit-jadwal', function(e) {
    e.preventDefault();
    var formData = new FormData();

    var namaJadwal = $('input[name=nama-jadwal-edit]').val();
    var semester = $('#list-semester-edit').children('option:selected').val();
    var bk = $('#list-bk-edit').children('option:selected').val();
    var file = $('#file-upload-edit')[0].files[0];
    var id = $('input[name=edit-id]').val();

    formData.append('nama', namaJadwal);
    formData.append('semester', semester);
    formData.append('bk', bk);
    formData.append('file', file);

    if(namaJadwal == "" || semester == "" || bk == "") {
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
      url: 'jadwal/update/' + id,
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
        if(data.status == "ok") {
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Berhasil Update Jadwal Kuliah!',
                timer: 1200,
                showConfirmButton: false
            });
            $('#form-edit-jadwal').trigger('reset');
            $('#editJadwalModal .close').click();
            loadDataJadwalKuliah();
        } else if(data.status == "empty_file") {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'File tidak boleh kosong!',
                timer: 1200,
                showConfirmButton: false
            });
        }

      }
    });
  }
  });

  //hapus jadwal
  $('body').on('click', '.btn-delete-jadwal', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      var judul = $(this).data('nama');
      Swal.fire({
          title: 'Anda yakin ingin menghapus ' + judul + '?',
          text: "Anda tidak dapat membatalkan aksi ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.value) {
              $.ajax({
                  type: 'GET',
                  url: 'jadwal/delete/' + id,
                  contentType: false,
                  processData: false,
                  success: function(data) {
                      if(data.status == 'deleted') {
                          Swal.fire(
                              'Deleted!',
                              'Berhasil Menghapus Jadwal',
                              )
                              loadDataJadwalKuliah();
                          }
                      }
                  });

              }
          });

      });

    //ALERT HISTORY COUNT
      function AlertCount(){
          $.ajax({
              type: "get",
              url: "/count-today-history-alert",
              success: function(response){
                  $("#jumlah_history_today").html(response.total);
              },
              error: function(err){
                  console.log(err);
              }
          });
      }

});
