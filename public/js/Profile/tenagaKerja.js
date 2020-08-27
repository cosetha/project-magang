$(document).ready(function() {
  $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
  loadDataTenaga();
  //load data tenaga_kependidikan
  function loadDataTenaga() {
      $('#datatable-tenaga').load('/tenaga/datatable', function() {
          var host = window.location.origin;
          $('#tenaga-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: {
                  url: '/tenaga/data',
                  type: 'GET'
              },
              columns: [
                  {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
                  {data: 'nama',name: 'nama'},
                  {data: 'alamat',name: 'alamat'},
                  {data: 'no_tlp',name: 'no_tlp'},
                  {data: 'nama_jabatan',name: 'nama_jabatan'},
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

  //dropdown jabatan
  $('body').on('click', '#btn-tambah-tk', function(e) {
    e.preventDefault();
    $('#jabatan').empty();
    $('#jabatan').append('<option value=""> -- Pilih Jabatan -- </option>');
    $.ajax({
        type: 'GET',
        url: 'tenaga/jabatan',
        contentType: false,
        processData: false,
        success: function(data) {
          $('#TenagaModal').modal('show');
          var jabatan = data.jb;
          for (var i = 0; i < jabatan.length; i++) {
            $("#jabatan").append('<option value="'+jabatan[i].id+'"> '+ jabatan[i].nama_jabatan +' </option>');
          }
        }
    });

  });

  //tambah tenaga kerja
  $('body').on('submit', '#form-tambah-tk', function(e) {
    e.preventDefault();
    var formData = new FormData();

    var nama = $('input[name=nama]').val();
    var alamat = $('input[name=alamat]').val();
    var telepon = $('input[name=telepon]').val();
    var jabatan = $('#jabatan').children('option:selected').val();
    var gambar = $('#file-upload')[0].files[0];

    formData.append('nama', nama);
    formData.append('alamat', alamat);
    formData.append('telepon', telepon);
    formData.append('jabatan', jabatan);
    formData.append('gambar', gambar);
    if(nama == "" || alamat == "" || telepon == "" || jabatan == "") {
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
        url: 'tenaga',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          if(data.status == 'ok') {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Berhasil menambahkan data!',
                timer: 1200,
                showConfirmButton: false
            });
            $('#form-tambah-tk').trigger('reset');
            $('#TenagaModal .close').click();
            loadDataTenaga();
          } else if(data.status == "image_not_valid"){
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'File harus berupa gambar!',
                timer: 1200,
                showConfirmButton: false
            });
          } else if(data.status == 'empty_image'){
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

  //tampil edit
  $('body').on('click', '.btn-edit-tenaga_kependidikan', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      var host = window.location.origin;
      $('input[name=edit-id]').val(id);

      $('#jabatan-edit').empty();
      $('#jabatan-edit').append('<option value=""> -- Pilih Jabatan -- </option>');
      $.ajax({
          type: 'GET',
          url: 'tenaga/jabatan',
          contentType: false,
          processData: false,
          success: function(data) {
            var jabatan = data.jb;
            for (var i = 0; i < jabatan.length; i++) {
              $("#jabatan-edit").append('<option value="'+jabatan[i].id+'"> '+ jabatan[i].nama_jabatan +' </option>');
            }
            $.ajax({
                type: 'GET',
                url: 'tenaga/edit/' + id,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#editTenagaModal').modal('show');
                    $('#image-edit-tenaga').attr('src', host + '/' + data.data[0].gambar);
                    $('#nama-edit').val(data.data[0].nama);
                    $('#alamat-edit').val(data.data[0].alamat);
                    $('#telp-edit').val(data.data[0].no_tlp);
                    $('#jabatan-edit option[value='+data.data[0].kode_jabatan+']').attr('selected','selected');
                }
            });

          }
      });

  });

  //submit edit tenaga
  $('body').on('submit', '#form-edit-tk', function(e) {
    e.preventDefault();
    var formData = new FormData();

    var id = $('input[name=edit-id]').val();
    var nama = $('input[name=nama-edit]').val();
    var alamat = $('input[name=alamat-edit]').val();
    var telepon = $('input[name=telp-edit]').val();
    var jabatan = $('#jabatan-edit').children('option:selected').val();
    var gambar = $('#file-upload-edit')[0].files[0];

    formData.append('nama', nama);
    formData.append('alamat', alamat);
    formData.append('telepon', telepon);
    formData.append('jabatan', jabatan);
    formData.append('gambar', gambar);
    if(nama == "" || alamat == "" || telepon == "" || jabatan == "") {
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
        url: 'tenaga/update/' + id,
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          if(data.status == 'ok') {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Berhasil edit data!',
                timer: 1200,
                showConfirmButton: false
            });
            $('#form-edit-tk').trigger('reset');
            $('#editTenagaModal .close').click();
            loadDataTenaga();
          } else if(data.status == "image_not_valid"){
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'File harus berupa gambar!',
                timer: 1200,
                showConfirmButton: false
            });
          }
        }
      });
    }
  });

  //hapus tenaga TenagaKependidikan
  $('body').on('click', '.btn-delete-tenaga_kependidikan', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('input[name=hapus-id]').val(id);
    $('#deleteTenagaModal').modal('show');
  });

  $('body').on('click', '#confirm-delete-tenaga', function(e) {
    e.preventDefault();
    var id = $('input[name=hapus-id]').val();
    $.ajax({
      type: 'GET',
      url: 'tenaga/delete/' + id,
      contentType: false,
      processData: false,
      success: function(data) {
        if(data.status == 'ok') {
          Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              )
          $('#deleteTenagaModal').modal('hide');
          loadDataTenaga();
        }
      }
    });
  });

});
