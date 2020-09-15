$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  loadDataKegiatan();
// ---- tambah kegiatan
  $('body').on('click', '#btn-tambah-kegiatan', function(e) {
    e.preventDefault();
    var formData = new FormData();
    var judul = $('input[name=judul]').val();
    var lokasi = $('input[name=lokasi]').val();
    var tanggal = $('input[name=tanggal]').val();
    var gambar = tinymce.get('gambar').getContent();
    var thumbnail = $('#file-upload')[0].files[0];

    formData.append('judul', judul);
    formData.append('lokasi', lokasi);
    formData.append('tanggal', tanggal);
    formData.append('gambar', gambar);
    formData.append('thumbnail', thumbnail);

    $.ajax({
      type: 'POST',
      url: 'kegiatanProdi',
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
        if(data.status == 'ok') {
          Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Berhasil Menambahkan Kegiatan',
            timer: 1200,
            showConfirmButton: false
          });
          $('#form-tambah-kegiatan').trigger('reset');
          $('#KegiatanModal .close').click();
          loadDataKegiatan();
        } else if(data.status == 'no_insert') {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Gagal Menambahkan Kegiatan',
            timer: 1200,
            showConfirmButton: false
          });
        } else if(data.status == "no_thumbnail"){
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Tidak ada thumbnail!',
            timer: 1200,
            showConfirmButton: false
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Judul Kegiatan, Lokasi, Tanggal, dan Upload Gambar tidak boleh kosong!',
            timer: 1200,
            showConfirmButton: false
          });
        }
      }
    });

  });

  //tampil kegiatan
  function loadDataKegiatan() {
    AlertCount();
    $('#datatable-kegiatan').load('/kegiatanProdi/datatable', function() {
      var host = window.location.origin;
      $('#kegiatan-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '/kegiatanProdi/data',
          type: 'GET'
        },
        columns: [
          {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
          {data: 'judul',name: 'judul'},
          {data: 'lokasi',name: 'lokasi'},
          {data: 'tanggal',name: 'tanggal'},
          {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
        ]
      });
    });
  }

  //edit kegiatan
  $('body').on('click', '.btn-edit-kegiatan', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var host = window.location.origin;
    console.log(id)
    $.ajax({
      type: 'GET',
      url: 'kegiatanProdi/edit/' + id,
      contentType: false,
      processData: false,
      success: function(data) {
          $('#editKegiatanModal').modal('show');
          $('#edit-judul').val(data.data.judul);
          $('#edit-lokasi').val(data.data.lokasi);
          $('#edit-tanggal').val(data.data.tanggal);
          tinymce.get('edit-gambar').setContent(data.data.gambar);
          $('#image-edit').attr('src', host + '/img/kemahasiswaan/kegiatan/' + data.data.thumbnail);
          $('input[name=edit-id]').val(id);
          $('#file-upload-edit').val('');
      }
    });
  });

    // update kegiatan
    $('body').on('submit','#form-edit-kegiatan', function(e) {
      e.preventDefault();
      var formData = new FormData();
      var judul = $('input[name=edit-judul]').val();
      var lokasi = $('input[name=edit-lokasi]').val();
      var tanggal = $('input[name=edit-tanggal]').val();
      var gambar = tinymce.get('edit-gambar').getContent();
      var thumbnail = $('#file-upload-edit')[0].files[0];
      var id = $('input[name=edit-id]').val();

      formData.append('judul', judul);
      formData.append('lokasi', lokasi);
      formData.append('tanggal', tanggal);
      formData.append('gambar', gambar);
      formData.append('thumbnail', thumbnail);

      $.ajax({
        type: 'POST',
        url: 'kegiatanProdi/update/' + id,
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          $('#editKegiatanModal').modal('hide');
          $('#form-edit-kegiatan').trigger('reset');

          if(data.status == 'ok') {
            Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: 'Berhasil Edit Kegiatan',
              timer: 1200,
              showConfirmButton: false
            });
            $('#editKegiatanModal').on('hidden.bs.modal', function () {
              $(this).find("input,input,input,textarea,select").val('').end();
            });
            loadDataKegiatan();
          } else if(data.status == 'no_insert') {
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Gagal Edit Kegiatan',
              timer: 1200,
              showConfirmButton: false
            });
          } else if(data.status == 'no_empty'){
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Judul Kegiatan, Nama Peneliti, Deskripsi, dan Tahun tidak boleh kosong!',
              timer: 1200,
              showConfirmButton: false
            });
          }

        },
        error: function(err){
            console.log(err)

        }
      });

    });

    //end edit kegiatan

    //hapus kegiatan
    $('body').on('click', '.btn-delete-kegiatan', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      var judul = $(this).attr('data-judul');
      console.log(judul);
      console.log(id);
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
            url: 'kegiatanProdi/delete/' + id,
            contentType: false,
            processData: false,
            success: function(data) {
              if(data.status == 'deleted') {
                Swal.fire(
                  'Deleted!',
                  'Berhasil Menghapus ' + judul+'.',
                )
                loadDataKegiatan();
              }
            }
          });

        }
      })

    });

    //show detail kegiatan
    $('body').on('click', '.btn-show-kegiatan', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      var host = window.location.origin;
      console.log(id)
      $.ajax({
        type: 'GET',
        url: 'kegiatanProdi/edit/' + id,
        contentType: false,
        processData: false,
        success: function(data) {
            $('#showKegiatanModal').modal('show');
            $('#show-judul').val(data.data.judul);
            $('#show-lokasi').val(data.data.lokasi);
            $('#show-tanggal').val(data.data.tanggal);
            tinymce.get('show-gambar').setContent(data.data.gambar);
            $('#image-show').attr('src', host + '/img/kemahasiswaan/kegiatan/' + data.data.thumbnail);
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


});
