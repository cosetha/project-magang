$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  loadDataLomba();
// ---- tambah lomba seminar
  $('body').on('click', '#btn-tambah-lomba', function(e) {
    e.preventDefault();
    var formData = new FormData();
    var judul = $('input[name=judul]').val();
    var deskripsi = tinymce.get('deskripsi').getContent();
    var lokasi = $('input[name=lokasi]').val();
    var tanggal = $('input[name=tanggal]').val();

    formData.append('judul', judul);
    formData.append('deskripsi', deskripsi);
    formData.append('lokasi', lokasi);
    formData.append('tanggal', tanggal);

    $.ajax({
      type: 'POST',
      url: 'lomba-seminar',
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
        if(data.status == 'ok') {
          Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Berhasil Menambahkan Data',
            timer: 1200,
            showConfirmButton: false
          });
          $('#form-tambah-lomba').trigger('reset');
          $('#LombaModal .close').click();
          loadDataLomba();
        } else if(data.status == 'no_insert') {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Gagal Menambahkan Data',
            timer: 1200,
            showConfirmButton: false
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data Harus Terisi Semua!',
            timer: 1200,
            showConfirmButton: false
          });
        }
      }
    });

  });

  //tampil Lomba Seminar
  function loadDataLomba() {
    AlertCount();
    $('#datatable-infoLomba').load('/lomba-seminar/datatable', function() {
      $('#infoLomba-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '/lomba-seminar/data',
          type: 'GET'
        },
        columns: [
          {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
          {data: 'judul',name: 'judul'},
          {data: 'deskripsi',name: 'deskripsi'},
          {data: 'lokasi',name: 'lokasi'},
          {data: 'tanggal',name: 'tanggal'},
          {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
        ]
      });
    });
  }

  //edit lomba seminar
  $('body').on('click', '.btn-edit-lomba', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    console.log(id)
    $.ajax({
      type: 'GET',
      url: 'lomba-seminar/edit/' + id,
      contentType: false,
      processData: false,
      success: function(data) {
          $('#editLombaModal').modal('show');
          $('#edit-judul').val(data.data.judul);
          tinymce.get('edit-deskripsi').setContent(data.data.deskripsi);
          $('#edit-lokasi').val(data.data.lokasi);
          $('#edit-tanggal').val(data.data.tanggal);
          $('input[name=edit-id]').val(id);
      }
    });
  });


    $('body').on('submit','#form-edit-lomba', function(e) {
      e.preventDefault();
      var formData = new FormData();
      var judul = $('input[name=edit-judul]').val();
      var deskripsi = tinymce.get('edit-deskripsi').getContent();
      var lokasi = $('input[name=edit-lokasi]').val();
      var tanggal = $('input[name=edit-tanggal]').val();
      var id = $('input[name=edit-id]').val();

      formData.append('judul', judul);
      formData.append('deskripsi', deskripsi);
      formData.append('lokasi', lokasi);
      formData.append('tanggal', tanggal);

      $.ajax({
        type: 'POST',
        url: 'lomba-seminar/update/' + id,
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          $('#editLombaModal').modal('hide');
          $('#form-edit-lomba').trigger('reset');

          if(data.status == 'ok') {
            Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: 'Berhasil Edit Data',
              timer: 1200,
              showConfirmButton: false
            });
            $('#editLombaModal').on('hidden.bs.modal', function () {
              $(this).find("input,textarea,input,input").val('').end();
            });
            loadDataLomba();
          } else if(data.status == 'no_insert') {
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Gagal Edit Data',
              timer: 1200,
              showConfirmButton: false
            });
          } else if(data.status == 'no_empty'){
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Data Tidak Boleh Kosong!',
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

    //end edit lomba seminar

    //hapus lomba seminar
    $('body').on('click', '.btn-delete-lomba', function(e) {
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
            url: 'lomba-seminar/delete/' + id,
            contentType: false,
            processData: false,
            success: function(data) {
              if(data.status == 'deleted') {
                Swal.fire(
                  'Deleted!',
                  'Berhasil Menghapus ' + judul+'.',
                )
                loadDataLomba();
              }
            }
          });

        }
      })

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
