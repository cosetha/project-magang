$(document).ready(function() {
  $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

  loadDataPengabdian();
// ---- tambah pengabdian
  $('body').on('click', '#btn-tambah-pengabdian', function(e) {
		e.preventDefault();
    var formData = new FormData();
    var judul = $('input[name=judul]').val();
    var deskripsi = tinymce.get('deskripsi').getContent();
    var tahun = $('input[name=tahun]').val();
    var gambar = $('#file-upload')[0].files[0];

    formData.append('judul', judul);
    formData.append('deskripsi', deskripsi);
    formData.append('tahun', tahun);
    formData.append('gambar', gambar);

    $.ajax({
			type: 'POST',
			url: 'pengabdian',
			data: formData,
			contentType: false,
			processData: false,
			success: function(data) {
				if(data.status == 'ok') {
          Swal.fire({
  					icon: 'success',
  					title: 'Sukses',
  					text: 'Berhasil Menambahkan Pengabdian',
  					timer: 1200,
  					showConfirmButton: false
  				});
          $('#form-tambah-pengabdian').trigger('reset');
          $('#PengabdianModal .close').click();
          loadDataPengabdian();
        } else if(data.status == 'no_insert') {
          Swal.fire({
  					icon: 'error',
  					title: 'Gagal',
  					text: 'Gagal Menambahkan Pengabdian',
  					timer: 1200,
  					showConfirmButton: false
  				});
        } else if(data.status == "no_gambar"){
          Swal.fire({
  					icon: 'error',
  					title: 'Gagal',
  					text: 'Tidak ada gambar!',
  					timer: 1200,
  					showConfirmButton: false
  				});
        } else {
          Swal.fire({
  					icon: 'error',
  					title: 'Gagal',
  					text: 'Judul Pengabdian, Deskripsi, dan Tahun tidak boleh kosong!',
  					timer: 1200,
  					showConfirmButton: false
  				});
        }
			}
		});

	});

  //tampil pengabdian
  function loadDataPengabdian() {
    AlertCount();
    $('#datatable-pengabdian').load('/pengabdian/datatable', function() {
      var host = window.location.origin;
      $('#pengabdian-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '/pengabdian/data',
          type: 'GET'
        },
        columns: [
          {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
          {data: 'judul',name: 'judul'},
          {data: 'deskripsi',name: 'deskripsi'},
          {data: 'tahun',name: 'tahun'},
          {
            data: 'gambar',
            name: 'gambar',
            "render": function(data, type, row) {
                return '<img src=" ' + host + '/img/riset/pengabdian/'+ data + ' " class = "rounded mx-auto d-block" height="100px"/>';
            },
            searchable: false,
            orderable: false
          },
          {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
        ]
      });
    });
  }

  //edit pengabdian
  $('body').on('click', '.btn-edit-pengabdian', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var host = window.location.origin;
    console.log(id)
    $.ajax({
			type: 'GET',
			url: 'pengabdian/edit/' + id,
			contentType: false,
			processData: false,
			success: function(data) {
			    $('#editPengabdianModal').modal('show');
          $('#edit-judul').val(data.data.judul);
          tinymce.get('edit-deskripsi').setContent(data.data.deskripsi);
          $('#tahun-edit').val(data.data.tahun);
          $('#image-edit').attr('src', host + '/img/riset/pengabdian/' + data.data.gambar);
          $('input[name=edit-id]').val(id);
          $('#file-upload-edit').val('');
			}
		});
  });


    $('body').on('submit','#form-edit-pengabdian', function(e) {
        // console.log("click")
      e.preventDefault();
      var formData = new FormData();
      var judul = $('input[name=edit-judul]').val();
      var deskripsi = tinymce.get('edit-deskripsi').getContent();
      var tahun = parseInt($('input[name=tahun_edit]').val());
      var gambar = $('#file-upload-edit')[0].files[0];
      var id = $('input[name=edit-id]').val();

      console.log(tahun)

    //   console.log(tahun)

      formData.append('judul', judul);
      formData.append('deskripsi', deskripsi);
      formData.append('tahun', tahun);
      formData.append('gambar', gambar);

      $.ajax({
        type: 'POST',
        url: 'pengabdian/update/' + id,
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          $('#editPengabdianModal').modal('hide');
          $('#form-edit-pengabdian').trigger('reset');


          if(data.status == 'ok') {
            Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: 'Berhasil Edit Pengabdian',
              timer: 1200,
              showConfirmButton: false
            });
            $('#editPengabdianModal').on('hidden.bs.modal', function () {
              $(this).find("input,textarea,input,select").val('').end();
            });
            loadDataPengabdian();
          } else if(data.status == 'no_insert') {
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Gagal Edit Pengabdian',
              timer: 1200,
              showConfirmButton: false
            });
          } else if(data.status == 'no_empty'){
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Judul Pengabdian, Deskripsi, dan Tahun tidak boleh kosong!',
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

    //end edit pengabdian

    //hapus pengabdian
    $('body').on('click', '.btn-delete-pengabdian', function(e) {
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
            url: 'pengabdian/delete/' + id,
            contentType: false,
            processData: false,
            success: function(data) {
              if(data.status == 'deleted') {
                Swal.fire(
                  'Deleted!',
                  'Berhasil Menghapus ' + judul+'.',
                )
                loadDataPengabdian();
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
