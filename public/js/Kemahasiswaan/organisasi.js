$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  loadDataOrganisasi();
// ---- tambah organisasi
  $('body').on('click', '#btn-tambah-organisasi', function(e) {
    e.preventDefault();
    var formData = new FormData();
    var nama = $('input[name=nama]').val();
    var deskripsi = tinymce.get('deskripsi').getContent();
    var logo = $('#file-upload')[0].files[0];

    formData.append('nama', nama);
    formData.append('deskripsi', deskripsi);
    formData.append('logo', logo);

    $.ajax({
      type: 'POST',
      url: 'organisasi',
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
        if(data.status == 'ok') {
          Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Berhasil Menambahkan Organisasi',
            timer: 1200,
            showConfirmButton: false
          });
          $('#form-tambah-organisasi').trigger('reset');
          $('#OrganisasiModal .close').click();
          loadDataOrganisasi();
        } else if(data.status == 'no_insert') {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Gagal Menambahkan Organisasi',
            timer: 1200,
            showConfirmButton: false
          });
        } else if(data.status == "no_logo"){
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Tidak ada Logo!',
            timer: 1200,
            showConfirmButton: false
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data harus terisi semua!',
            timer: 1200,
            showConfirmButton: false
          });
        }
      }
    });

  });

  //tampil organisasi
  function loadDataOrganisasi() {
    $('#datatable-organisasi').load('/organisasi/datatable', function() {
      var host = window.location.origin;
      $('#organisasi-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '/organisasi/data',
          type: 'GET'
        },
        columns: [
          {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
          {data: 'nama',name: 'nama'},
          {data: 'deskripsi',name: 'deskripsi'},
          {
            data: 'logo',
            name: 'logo',
            "render": function(data, type, row) {
                return '<img src=" ' + host + '/img/kemahasiswaan/organisasi/'+ data + ' " class = "rounded mx-auto d-block" height="100px"/>';
            },
            searchable: false,
            orderable: false
          },
          {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
        ]
      });
    });
  }

  //edit organisasi
  $('body').on('click', '.btn-edit-organisasi', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var host = window.location.origin;
    console.log(id)
    $.ajax({
      type: 'GET',
      url: 'organisasi/edit/' + id,
      contentType: false,
      processData: false,
      success: function(data) {
          $('#editOrganisasiModal').modal('show');
          $('#edit-nama').val(data.data.nama);
          tinymce.get('edit-deskripsi').setContent(data.data.deskripsi);
          $('#image-edit').attr('src', host + '/img/kemahasiswaan/organisasi/' + data.data.logo);
          $('input[name=edit-id]').val(id);
          $('#file-upload-edit').val('');
      }
    });
  });


    $('body').on('submit','#form-edit-organisasi', function(e) {
      e.preventDefault();
      var formData = new FormData();
      var nama = $('input[name=edit-nama]').val();
      var deskripsi = tinymce.get('edit-deskripsi').getContent();
      var logo = $('#file-upload-edit')[0].files[0];
      var id = $('input[name=edit-id]').val();

      formData.append('nama', nama);
      formData.append('deskripsi', deskripsi);
      formData.append('logo', logo);

      $.ajax({
        type: 'POST',
        url: 'organisasi/update/' + id,
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          $('#editOrganisasiModal').modal('hide');
          $('#form-edit-organisasi').trigger('reset');

          if(data.status == 'ok') {
            Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: 'Berhasil Edit Organisasi',
              timer: 1200,
              showConfirmButton: false
            });
            $('#editOrganisasiModal').on('hidden.bs.modal', function () {
              $(this).find("input,textarea,select").val('').end();
            });
            loadDataOrganisasi();
          } else if(data.status == 'no_insert') {
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Gagal Edit Organisasi',
              timer: 1200,
              showConfirmButton: false
            });
          } else if(data.status == 'no_empty'){
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Data harus terisi semua!',
              timer: 1200,
              showConfirmButton: false
            });
          }

        },
        error: function(err){
            console.log(err);

        }
      });

    });

    //end edit organisasi

    //hapus organisasi
    $('body').on('click', '.btn-delete-organisasi', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      var nama = $(this).attr('data-nama');
      console.log(nama);
      console.log(id);
      Swal.fire({
        title: 'Anda yakin ingin menghapus ' + nama + '?',
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
            url: 'organisasi/delete/' + id,
            contentType: false,
            processData: false,
            success: function(data) {
              if(data.status == 'deleted') {
                Swal.fire(
                  'Deleted!',
                  'Berhasil Menghapus ' + nama+'.',
                )
                loadDataOrganisasi();
              }
            }
          });

        }
      })

    });

});
