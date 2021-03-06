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
    if(judul == "" || deskripsi == null || lampiran == null) {
      Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Judul, Deskripsi dan Lampiran tidak boleh kosong!',
        timer: 1200,
        showConfirmButton: false
      });
    } else {
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
          $('#form-tambah-pengumuman').trigger('reset');
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
        } else if(data.status == "error_validation"){
          if(data.message == "validation.mimes") {
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Lampiran harus jpg,jpeg,png,svg,gif,doc,docx,pdf,xls,xlsx',
              timer: 1200,
              showConfirmButton: false
            });
          } else if(data.message == "validation.max.file") {
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Lampiran tidak boleh lebih 8 MB!',
              timer: 1200,
              showConfirmButton: false
            });
          }
          
        } else {
          Swal.fire({
  					icon: 'error',
  					title: 'Gagal',
  					text: 'Terjadi Kesalahan!',
  					timer: 1200,
  					showConfirmButton: false
  				});
        }
			}
    });
  }

	});

  //tampil pengumuman
  function loadDataPengumuman() {
    AlertCount();
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
          {data: 'file',name: 'file'},
          {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
        ]
      });
    });
  }

  //edit pengumuman
  $('body').on('click', '.btn-edit-pengumuman', function(e) {
		e.preventDefault();
    var id = $(this).data('id');
    $('#lampiran').empty();
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
        $('#lampiran').append(data.data.lampiran);
        $('#lampiran').attr('href', data.data.lampiran);
			}
		});
  });

  //update pengumuman
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

    //hapus pengumuman
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
      });

    });
    //detail pengumuman
    $('body').on('click', '.btn-show-pengumuman', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      $('#file-pengumuman').empty();
      $.ajax({
  			type: 'GET',
  			url: 'pengumuman/show/' + id,
  			contentType: false,
  			processData: false,
  			success: function(data) {
  				$('#showPengumumanModal').modal('show');
          $('#show-judul').val(data.data.judul);
          tinymce.get('show-deskripsi').setContent(data.data.deskripsi);
          $('#file-pengumuman').append(data.data.lampiran).attr('href', data.data.lampiran);
          $('#show-judul').attr('disabled', true);
				  tinymce.get('show-deskripsi').setMode('readonly');
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
