$(document).ready(function() {
  $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

  loadDataFasilitas();
// ---- tambah fasilitas
  $('body').on('click', '#btn-tambah-fasilitas', function(e) {
	e.preventDefault();
    var formData = new FormData();
    var nama_fasilitas = $('input[name=nama_fasilitas]').val();
    var deskripsi = tinymce.get('deskripsi-tambah').getContent();
    var gambar = $('#file-upload')[0].files[0];

    formData.append('nama_fasilitas', nama_fasilitas);
    formData.append('deskripsi', deskripsi);
    formData.append('gambar', gambar);

    $(".btn-close").css("display","none");
    $(".btn-loading").css("display","");
    $(".btn-submit").css("display","none");

    $.ajax({
			type: 'POST',
			url: 'fasilitas',
			data: formData,
			contentType: false,
			processData: false,
			success: function(data) {
				if(data.status == 'ok') {
                Swal.fire({
  					icon: 'success',
  					title: 'Sukses',
  					text: 'Berhasil Menambahkan Fasilitas',
  					timer: 1200,
  					showConfirmButton: false
                  });
                  $(".btn-close").css("display","");
                  $(".btn-loading").css("display","none");
                  $(".btn-submit").css("display","");
                  $('#form-tambah-fasilitas').trigger('reset');
                  $('#FasilitasModal .close').click();
                  loadDataFasilitas();
        } else if(data.status == 'no_insert') {
            $(".btn-close").css("display","");
                  $(".btn-loading").css("display","none");
                  $(".btn-submit").css("display","");
          Swal.fire({
  					icon: 'error',
  					title: 'Gagal',
  					text: 'Gagal Menambahkan Fasilitas',
  					timer: 1200,
  					showConfirmButton: false
  				});
        } else if(data.status == "no_gambar"){
            $(".btn-close").css("display","");
                  $(".btn-loading").css("display","none");
                  $(".btn-submit").css("display","");
          Swal.fire({
  					icon: 'error',
  					title: 'Gagal',
  					text: 'Tidak ada gambar!',
  					timer: 1200,
  					showConfirmButton: false
  				});
        } else {
            $(".btn-close").css("display","");
                  $(".btn-loading").css("display","none");
                  $(".btn-submit").css("display","");
          Swal.fire({
  					icon: 'error',
  					title: 'Gagal',
  					text: 'Nama Fasilitas dan Deskripsi tidak boleh kosong!',
  					timer: 1200,
  					showConfirmButton: false
  				});
        }
			}
		});

	});

  //tampil fasilitas
  function loadDataFasilitas() {
    AlertCount();
    $('#datatable-fasilitas').load('/fasilitas/datatable', function() {
      var host = window.location.origin;
      $('#fasilitas-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '/fasilitas/data',
          type: 'GET'
        },
        columns: [
          {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
          {data: 'nama_fasilitas',name: 'nama_fasilitas'},
          {
            data: 'gambar',
            name: 'gambar',
            "render": function(data, type, row) {
                return '<img src=" ' + host + '/img/fasilitas/'+ data + ' " class = "rounded mx-auto d-block" height="100px"/>';
            },
            searchable: false,
            orderable: false
          },
          {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
        ]
      });
    });
  }

  //edit fasilitas
  $('body').on('click', '.btn-edit-fasilitas', function(e) {
        e.preventDefault();
    var id = $(this).data('id');
    var host = window.location.origin;
    console.log(id);
    $.ajax({
			type: 'GET',
			url: 'fasilitas/edit/' + id,
			contentType: false,
			processData: false,
			success: function(data) {
			    $('#editFasilitasModal').modal('show');
          $('#edit-nama_fasilitas').val(data.data.nama_fasilitas);
          tinymce.get('edit-deskripsi').setContent(data.data.deskripsi);
          $('#image-edit').attr('src', host + '/img/fasilitas/' + data.data.gambar);
          $('input[name=edit-id]').val(id);
          $('#file-upload-edit').val('');
			}
		});
  });


    $('body').on('submit','#form-edit-fasilitas', function(e) {
        console.log("click")
      e.preventDefault();
      var formData = new FormData();
      var nama_fasilitas = $('input[name=edit-nama_fasilitas]').val();
      var deskripsi = tinymce.get('edit-deskripsi').getContent();
      var gambar = $('#file-upload-edit')[0].files[0];
      var id = $('input[name=edit-id]').val();

      formData.append('nama_fasilitas', nama_fasilitas);
      formData.append('deskripsi', deskripsi);
      formData.append('gambar', gambar);

      $(".btn-close").css("display","none");
      $(".btn-save").css("display","none");
      $(".btn-loading").css("display","");

      $.ajax({
        type: 'POST',
        url: 'fasilitas/update/' + id,
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          if(data.status == 'ok') {
            $('#editFasilitasModal').modal('hide');
            $('#form-edit-fasilitas').trigger('reset');
            $(".btn-close").css("display","");
            $(".btn-save").css("display","");
            $(".btn-loading").css("display","none");
            Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: 'Berhasil Edit Fasilitas',
              timer: 1200,
              showConfirmButton: false
            });
            $('#editFasilitasModal').on('hidden.bs.modal', function () {
              $(this).find("input,textarea,select").val('').end();
            });
            loadDataFasilitas();
          } else if(data.status == 'no_insert') {
            $(".btn-close").css("display","");
            $(".btn-save").css("display","");
            $(".btn-loading").css("display","none");
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Gagal Edit Fasilitas',
              timer: 1200,
              showConfirmButton: false
            });
          } else if(data.status == 'no_empty'){
            $(".btn-close").css("display","");
            $(".btn-save").css("display","");
            $(".btn-loading").css("display","none");
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Nama Fasilitas dan Deskripsi tidak boleh kosong!',
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

    //end edit fasilitas

    //hapus fasilitas
    $('body').on('click', '.btn-delete-fasilitas', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      var nama_fasilitas = $(this).attr('data-nama_fasilitas');

      Swal.fire({
        title: 'Hapus ' + nama_fasilitas + '?',
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
            url: 'fasilitas/delete/' + id,
            contentType: false,
            processData: false,
            success: function(data) {
              if(data.status == 'deleted') {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: nama_fasilitas+' Dihapus!',
                    timer: 1200,
                    showConfirmButton: false
                  });
                  loadDataFasilitas();
              }
            }
          });

        }
      })

    });

    //show
    $("body").on("click",".btn-show-fasilitas", function(e){
        e.preventDefault();
        $("#showFasilitasModal").modal("show");

        var id = $(this).attr("data-id");
        console.log(id);
        $.ajax({
            type: "get",
            url: "fasilitas/show/"+id,
            success: function(response){
                console.log(response.data);
                $("#nama-fasilitas-show").val(response.data.nama_fasilitas);
                tinymce.get('deskripsi-fasilitas-show').setContent(response.data.deskripsi);
                tinymce.get('deskripsi-fasilitas-show').setMode('readonly');
            },
            error: function(err){
                console.log(err);
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
