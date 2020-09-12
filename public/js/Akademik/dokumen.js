$(document).ready(function() {
  $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
  loadDataDokumen();
  //load data dokumen
  function loadDataDokumen() {
      $('#datatable-dokumen').load('/dokumen/datatable', function() {
          var host = window.location.origin;
          $('#dokumen-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: {
                  url: '/dokumen/data',
                  type: 'GET'
              },
              columns: [
                  {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
                  {data: 'nama_dokumen',name: 'nama_dokumen'},
                  {data: 'file_dokumen',name: 'file_dokumen'},
                  {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
              ]
          });
      });
  }

  //tambah dokumen
  $('body').on('submit', '#form-tambah-dokumen', function(e) {
    e.preventDefault();
    var formData = new FormData();

    var namaDokumen = $('input[name=nama-dokumen]').val();
    var file = $('#file-upload')[0].files[0];
    formData.append('nama', namaDokumen);
    formData.append('file', file);

    if(namaDokumen == "" || file == null) {
      Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'Nama Dokumen dan File tidak boleh kosong!',
          timer: 1200,
          showConfirmButton: false
      });
    } else {
    $.ajax({
      type: 'POST',
      url: 'dokumen',
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
        if(data.status == "ok") {
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Berhasil Menambahkan Dokumen!',
                timer: 1200,
                showConfirmButton: false
            });
            $('#form-tambah-dokumen').trigger('reset');
            $('#DokumenModal .close').click();
            loadDataDokumen();
        }

      }
    });
  }
  });

  //edit dokumen
  $('body').on('click', '.btn-edit-dokumen', function(e) {
    e.preventDefault();
    $('#editDokumenModal').modal('show');
    $('#view-file').empty();
    var id = $(this).data('id');
    $('input[name=edit-id]').val(id);
    $.ajax({
        type: 'GET',
        url: 'dokumen/edit/' + id,
        contentType: false,
        processData: false,
        success: function(data) {
          $('#nama-dokumen-edit').val(data.data.nama_dokumen);
          $('#view-file').append(data.data.file).attr('href', data.data.file);;
        }
    });
  });

  //update dokumen
  $('body').on('submit', '#form-edit-dokumen', function(e) {
    e.preventDefault();
    var formData = new FormData();
    var id = $('input[name=edit-id]').val();
    var namaDokumen = $('input[name=nama-dokumen-edit]').val();
    var file = $('#file-upload-edit')[0].files[0];
    formData.append('nama', namaDokumen);
    formData.append('file', file);

    if(namaDokumen == "") {
      Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'Nama Dokumen tidak boleh kosong!',
          timer: 1200,
          showConfirmButton: false
      });
    } else {
    $.ajax({
      type: 'POST',
      url: 'dokumen/update/' + id,
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
        if(data.status == "ok") {
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Berhasil Menambahkan Dokumen!',
                timer: 1200,
                showConfirmButton: false
            });
            $('#form-edit-dokumen').trigger('reset');
            $('#editDokumenModal .close').click();
            loadDataDokumen();
        }

      }
    });
  }
  });

  $('body').on('click', '.btn-delete-dokumen', function(e) {
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
                  url: 'dokumen/delete/' + id,
                  contentType: false,
                  processData: false,
                  success: function(data) {
                      if(data.status == 'deleted') {
                          Swal.fire(
                              'Deleted!',
                              'Your file has been deleted.',
                              )
                              loadDataDokumen();
                          }
                      }
                  });

              }
          })

      });

});
