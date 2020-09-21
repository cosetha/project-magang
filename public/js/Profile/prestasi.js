$(document).ready(function() {
  $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
  loadDataPrestasi();
  //load DataTable
  function loadDataPrestasi() {
    AlertCount();
      $('#datatable-prestasi').load('/prestasi/datatable', function() {
          var host = window.location.origin;
          $('#prestasi-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: {
                  url: '/prestasi/data',
                  type: 'GET'
              },
              columns: [
                  {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
                  {data: 'nama_kejuaraan',name: 'nama_kejuaraan'},
                  {data: 'nama',name: 'nama'},
                  {data: 'peringkat',name: 'peringkat'},
                  {data: 'tahun',name: 'tahun'},
                  {data: 'nama_bk',name: 'nama_bk'},
                  {
                      data: 'gambar',
                      name: 'gambar',
                      "render": function(data, type, row) {
                          return '<img src=" ' + host + '/'+ data + ' " style="height:100px;width:100px;"/>';
                      },
                      searchable: false
                  },
                  {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
              ]
          });
      });
  }

  //tampil bk
  $('body').on('click', '#btn-tambah-prestasi', function(e) {
    e.preventDefault();
    $('#list-bk').empty();
    $("#list-bk").append('<option value=""> -- Pilih Bidang Keahlian -- </option>');
    $.ajax({
        type: 'GET',
        url: 'prestasi/get-bk',
        contentType: false,
        processData: false,
        success: function(data) {
          $('#PrestasiModal').modal('show');
          var bk = data.data;
          for (var i = 0; i < bk.length; i++) {
            // var val = i+1;
            $(".bk").append('<option value="'+bk[i].id+'"> '+ bk[i].nama_bk +' </option>');
          }
        }
    });
  });

  //tambah prestasi
  $('body').on('submit', '#form-tambah-prestasi', function(e) {
    e.preventDefault();
    var formData = new FormData();

    var namaKejuaraaan = $('input[name=nama-kejuaraan]').val();
    var nama = $('input[name=nama]').val();
    var peringkat = $('#peringkat').children('option:selected').val();
    var tahun = $('input[name=tahun]').val();
    var bk = $('#list-bk').children('option:selected').val();
    var gambar = $('#file-upload')[0].files[0];
    formData.append('nama_kejuaraan', namaKejuaraaan);
    formData.append('nama', nama);
    formData.append('peringkat', peringkat);
    formData.append('tahun', tahun);
    formData.append('bk', bk);
    formData.append('gambar', gambar);
    if(namaKejuaraaan == "" || nama == "" || peringkat == "" || tahun == "" || bk == "" || gambar == "") {
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
      url: 'prestasi',
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
        if(data.status == "ok") {
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Berhasil Menambahkan Prestasi!',
                timer: 1200,
                showConfirmButton: false
            });
            $('#form-tambah-prestasi').trigger('reset');
            $('#PrestasiModal .close').click();
            loadDataPrestasi();
        } else if(data.status == "img_not_valid") {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Silahkan unggah file gambar!',
                timer: 1200,
                showConfirmButton: false
            });
        } else if(data.status == "empty_image") {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Gambar tidak boleh kosong!',
                timer: 1200,
                showConfirmButton: false
            });
        }

      }
    });
  }
  });

  //tampil edit prestasi
  $('body').on('click', '.btn-edit-prestasi', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      var host = window.location.origin;
      $('input[name=edit-id]').val(id);

      $('#bk-edit').empty();
      $('#bk-edit').append('<option value=""> -- Pilih Bidang Keahlian -- </option>');
      $.ajax({
          type: 'GET',
          url: 'prestasi/get-bk',
          contentType: false,
          processData: false,
          success: function(data) {
            var bk = data.data;
            for (var i = 0; i < bk.length; i++) {
              $("#bk-edit").append('<option value="'+bk[i].id+'"> '+ bk[i].nama_bk +' </option>');
            }
            $.ajax({
                type: 'GET',
                url: 'prestasi/edit/' + id,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#editPrestasiModal').modal('show');
                    $('#image-edit-prestasi').attr('src', host + '/' + data.data.gambar);
                    $('#nama-kejuaraan-edit').val(data.data.nama_kejuaraan);
                    $('#nama-edit').val(data.data.nama);
                    $('#tahun-edit').val(data.data.tahun);
                    // $('#peringkat-edit').empty();
                    $('#peringkat-edit option[value="'+data.data.peringkat+'"]').attr('selected','selected');
                    // $('#telp-edit').val(data.data[0].no_tlp);
                    $('#bk-edit option[value='+data.data.id_bidang_keahlian+']').attr('selected','selected');
                }
            });

          }
      });

  });

  //update prestasi
  $('body').on('submit', '#form-edit-prestasi', function(e) {
    e.preventDefault();
    var formData = new FormData();
    var id = $('input[name=edit-id]').val();
    var namaKejuaraaan = $('input[name=nama-kejuaraan-edit]').val();
    var nama = $('input[name=nama-edit]').val();
    var peringkat = $('#peringkat-edit').children('option:selected').val();
    var tahun = $('input[name=tahun-edit]').val();
    var bk = $('#bk-edit').children('option:selected').val();
    var gambar = $('#file-upload-edit')[0].files[0];
    formData.append('nama_kejuaraan', namaKejuaraaan);
    formData.append('nama', nama);
    formData.append('peringkat', peringkat);
    formData.append('tahun', tahun);
    formData.append('bk', bk);
    formData.append('gambar', gambar);
    if(namaKejuaraaan == "" || nama == "" || peringkat == "" || tahun == "" || bk == "" || gambar == "") {
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
      url: 'prestasi/update/' + id,
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
        if(data.status == "ok") {
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Berhasil Update Prestasi!',
                timer: 1200,
                showConfirmButton: false
            });
            $('#form-edit-prestasi').trigger('reset');
            $('#editPrestasiModal .close').click();
            loadDataPrestasi();
        } else if(data.status == "img_not_valid") {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Silahkan unggah file gambar!',
                timer: 1200,
                showConfirmButton: false
            });
        }

      }
    });
  }
  });

  //hapus Prestasi
  $('body').on('click', '.btn-delete-prestasi', function(e) {
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
                  url: 'prestasi/delete/' + id,
                  contentType: false,
                  processData: false,
                  success: function(data) {
                      if(data.status == 'deleted') {
                          Swal.fire(
                              'Deleted!',
                              'Your file has been deleted.',
                              )
                              loadDataPrestasi();
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
