$(document).ready(function() {
  $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

  loadDataPengumuman();
// ---- tambah pengumuman
  $('body').on('click', '#btn-tambah-pengumuman', function(e) {
		e.preventDefault();
    var formData = new FormData();
    var judul = $('input[name=judul]').val();
    var deskripsi = tinymce.get('deskripsi-tambah').getContent();
    var lampiran = $('#file-upload')[0].files[0];

    formData.append('judul', judul);
    formData.append('deskripsi', deskripsi);
    formData.append('lampiran', lampiran);

    $.ajax({
			type: 'POST',
			url: 'pengumuman',
			data: formData,
			contentType: false,
			processData: false,
			success: function(data) {
				if(data.status == 'ok') {
          Swal.fire({
  					icon: 'success',
  					title: 'Sukses',
  					text: 'Berhasil Menambahkan Pengumuman',
  					timer: 1200,
  					showConfirmButton: false
  				});
          $('#PengumumanModal .close').click();
          loadDataPengumuman();
        } else if(data.status == 'no_insert') {
          Swal.fire({
  					icon: 'error',
  					title: 'Gagal',
  					text: 'Gagal Menambahkan Pengumuman',
  					timer: 1200,
  					showConfirmButton: false
  				});
        } else if(data.status == "no_lampiran"){
          Swal.fire({
  					icon: 'error',
  					title: 'Gagal',
  					text: 'Tidak ada lampiran!',
  					timer: 1200,
  					showConfirmButton: false
  				});
        } else {
          Swal.fire({
  					icon: 'error',
  					title: 'Gagal',
  					text: 'Judul dan Deskripsi tidak boleh kosong!',
  					timer: 1200,
  					showConfirmButton: false
  				});
        }
			}
		});

	});

  //tampil pengumuman
  function loadDataPengumuman() {
    $('#datatable-pengumuman').load('/pengumuman/datatable', function() {
      $('#pengumuman-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '/pengumuman/data',
          type: 'GET'
        },
        columns: [
          {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
          {data: 'judul',name: 'judul'},
          {data: 'deskripsi',name: 'deskripsi'},
          {data: 'lampiran',name: 'lampiran'},
          {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
        ]
      });
    });
  }

  //edit pengumuman
  $('body').on('click', '.btn-edit-pengumuman', function(e) {
		e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
			type: 'GET',
			url: 'pengumuman/edit/' + id,
			contentType: false,
			processData: false,
			success: function(data) {
				$('#editPengumumanModal').modal('show');
        $('#edit-judul').val(data.data.judul);
        tinymce.get('edit-deskripsi').setContent(data.data.deskripsi);
        $('input[name=edit-id]').val(id);
        $('#file-upload-edit').val('');
			}
		});
  });


    $('body').on('submit', '#form-edit-pengumuman', function(e) {
      e.preventDefault();
      var formData = new FormData();
      var judul = $('input[name=edit-judul]').val();
      var deskripsi = tinymce.get('edit-deskripsi').getContent();
      var lampiran = $('#file-upload-edit')[0].files[0];
      var id = $('input[name=edit-id]').val();

      formData.append('judul', judul);
      formData.append('deskripsi', deskripsi);
      formData.append('lampiran', lampiran);

      $.ajax({
        type: 'POST',
        url: 'pengumuman/update/' + id,
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          $('#editPengumumanModal').modal('hide');
          $('#form-edit-pengumuman').trigger('reset');
          if(data.status == 'ok') {
            Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: 'Berhasil Edit Pengumuman',
              timer: 1200,
              showConfirmButton: false
            });
            $('#editPengumumanModal').on('hidden.bs.modal', function () {
              $(this).find("input,textarea,select").val('').end();
            });
            loadDataPengumuman();
          } else if(data.status == 'no_insert') {
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Gagal Edit Pengumuman',
              timer: 1200,
              showConfirmButton: false
            });
          } else if(data.status == 'no_empty'){
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Judul dan Deskripsi tidak boleh kosong!',
              timer: 1200,
              showConfirmButton: false
            });
          }

        }
      });

    });

    //end edit pengumuman
    $('body').on('click', '.btn-delete-pengumuman', function(e) {
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
            url: 'pengumuman/delete/' + id,
            contentType: false,
            processData: false,
            success: function(data) {
              if(data.status == 'deleted') {
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                )
                loadDataPengumuman();
              }
            }
          });

        }
      })

    });


});
