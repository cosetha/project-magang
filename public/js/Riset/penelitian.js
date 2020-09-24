$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  loadDataPenelitian();
// ---- tambah penelitian
  $('body').on('click', '#btn-tambah-penelitian', function(e) {
    e.preventDefault();
    var formData = new FormData();
    var judul = $('input[name=judul]').val();
    var peneliti = $('input[name=peneliti]').val();
    var deskripsi = tinymce.get('deskripsi').getContent();
    var luaran = tinymce.get('hasil_luaran').getContent();
    var tahun = $('input[name=tahun]').val();
    var gambar = $('#file-upload')[0].files[0];

    formData.append('judul', judul);
    formData.append('peneliti', peneliti);
    formData.append('deskripsi', deskripsi);
    formData.append('luaran', luaran);
    formData.append('tahun', tahun);
    formData.append('gambar', gambar);

    $("#btn-tambah-penelitian").css("display","none")
    $(".btn-close").css("display","none")
    $(".btn-loading").css("display","")

    $.ajax({
      type: 'POST',
      url: 'penelitian',
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
        if(data.status == 'ok') {
          Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Berhasil Menambahkan Penelitian',
            timer: 1200,
            showConfirmButton: false
          });
          $('#form-tambah-penelitian').trigger('reset');
          $('#PenelitianModal .close').click();
          loadDataPenelitian();
        } else if(data.status == 'no_insert') {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Gagal Menambahkan Penelitian',
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
            text: 'Form tidak boleh ada yang kosong!',
            timer: 1200,
            showConfirmButton: false
          });
        }
        $("#btn-tambah-penelitian").css("display","")
        $(".btn-close").css("display","")
        $(".btn-loading").css("display","none")
      },
      error: function(err){
          console.log(err)
      }
    });

  });

  //tampil penelitian
  function loadDataPenelitian() {
    AlertCount();
    $('#datatable-penelitian').load('/penelitian/datatable', function() {
      var host = window.location.origin;
      $('#penelitian-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '/penelitian/data',
          type: 'GET'
        },
        columns: [
          {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
          {data: 'judul',name: 'judul'},
          {data: 'peneliti',name: 'peneliti'},
          {data: 'tahun',name: 'tahun'},
          {
            data: 'gambar',
            name: 'gambar',
            "render": function(data, type, row) {
                return '<img src=" ' + host + '/img/riset/penelitian/'+ data + ' " class = "rounded mx-auto d-block" height="100px"/>';
            },
            searchable: false,
            orderable: false
          },
          {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
        ]
      });
    });
  }

  //edit penelitian
  $('body').on('click', '.btn-edit-penelitian', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var host = window.location.origin;
    console.log(id)
    $.ajax({
      type: 'GET',
      url: 'penelitian/edit/' + id,
      contentType: false,
      processData: false,
      success: function(data) {
          $('#editPenelitianModal').modal('show');
          $('#edit-judul').val(data.data.judul);
          $('#edit-peneliti').val(data.data.peneliti);
          tinymce.get('edit-deskripsi').setContent(data.data.deskripsi);
          tinymce.get('edit_hasil_luaran').setContent(data.data.hasil_luaran);
          $('#tahun-edit').val(data.data.tahun);
          $('#image-edit').attr('src', host + '/img/riset/penelitian/' + data.data.gambar);
          $('input[name=edit-id]').val(id);
          $('#file-upload-edit').val('');
      }
    });
  });


    $('body').on('submit','#form-edit-penelitian', function(e) {
      e.preventDefault();
      var formData = new FormData();
      var judul = $('input[name=edit-judul]').val();
      var peneliti = $('input[name=edit-peneliti]').val();
      var deskripsi = tinymce.get('edit-deskripsi').getContent();
      var luaran = tinymce.get('edit_hasil_luaran').getContent();
      var tahun = parseInt($('input[name=tahun_edit]').val());
      var gambar = $('#file-upload-edit')[0].files[0];
      var id = $('input[name=edit-id]').val();

      console.log(tahun)

      $("#btn-edit-penelitian").css("display","none")
    $(".btn-close").css("display","none")
    $(".btn-loading").css("display","")

      formData.append('judul', judul);
      formData.append('peneliti', peneliti);
      formData.append('deskripsi', deskripsi);
      formData.append('luaran', luaran);
      formData.append('tahun', tahun);
      formData.append('gambar', gambar);

      $.ajax({
        type: 'POST',
        url: 'penelitian/update/' + id,
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {

          if(data.status == 'ok') {
            $('#editPenelitianModal').modal('hide');
            $('#form-edit-penelitian').trigger('reset');
            Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: 'Berhasil Edit Penelitian',
              timer: 1200,
              showConfirmButton: false
            });
            $('#editPenelitianModal').on('hidden.bs.modal', function () {
              $(this).find("input,input,textarea,input,select").val('').end();
            });
            loadDataPenelitian();
          } else if(data.status == 'no_insert') {
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Gagal Edit Penelitian',
              timer: 1200,
              showConfirmButton: false
            });
          } else if(data.status == 'no_empty'){
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Form tidak boleh ada yang kosong!',
              timer: 1200,
              showConfirmButton: false
            });
          }
          $("#btn-edit-penelitian").css("display","")
        $(".btn-close").css("display","")
        $(".btn-loading").css("display","none")

        },
        error: function(err){
            console.log(err)

        }
      });

    });

    //end edit penelitian

    //hapus penelitian
    $('body').on('click', '.btn-delete-penelitian', function(e) {
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
            url: 'penelitian/delete/' + id,
            contentType: false,
            processData: false,
            success: function(data) {
              if(data.status == 'deleted') {
                Swal.fire(
                  'Deleted!',
                  'Berhasil Menghapus ' + judul+'.',
                  'success'
                )
                loadDataPenelitian();
              }
            }
          });

        }
      })

    });

    //SHOW DETAIL
    $("body").on("click",".btn-show-penelitian", function(e){
        e.preventDefault()
        $("#showPenelitianModal").modal("show")

        var id = $(this).attr("data-id")
        var host = window.location.origin;
        $.ajax({
            type: "get",
            url: "penelitian/edit/" + id,
            success: function(response){
                $("#show-judul").val(response.data.judul)
                $("#show-peneliti").val(response.data.peneliti)
                tinymce.get('show-deskripsi').setContent(response.data.deskripsi);
                tinymce.get('show-deskripsi').setMode('readonly');
                tinymce.get('show_hasil_luaran').setContent(response.data.hasil_luaran);
                tinymce.get('show_hasil_luaran').setMode('readonly');
                $("#show-tahun").val(response.data.tahun)
                $('#show-image').attr('src', host + '/img/riset/penelitian/' + response.data.gambar);
            },
            error: function(err){
                console.log(err)
            }
        })
    })

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
