$(document).ready(function() {
  $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

  loadDataAgenda();
  //tampil agenda
  function loadDataAgenda() {
    $('#datatable-agenda').load('/agenda/datatable', function() {
      var host = window.location.origin;
      $('#agenda-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '/agenda/data',
          type: 'GET'
        },
        columns: [
          {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
          {data: 'judul',name: 'judul'},
          {data: 'deskripsi',name: 'deskripsi'},
          {
            data: 'gambar',
            name: 'gambar',
            "render": function(data, type, row) {
                return '<img src=" ' + host + '/'+ data + ' " style="height:100px;width:100px;"/>';
            },
            searchable: false
          },
          {data: 'jam_agenda',name: 'jam_agenda'},
          {data: 'tanggal_mulai',name: 'tanggal_mulai'},
          {data: 'tanggal_selesai',name: 'tanggal_selesai'},
          {data: 'lokasi',name: 'lokasi'},
          {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
        ]
      });
    });
  }
  //tambah agenda
  $('body').on('submit', '#form-tambah-agenda', function(e) {
    e.preventDefault();
    var formData = new FormData();
    var judul = $('input[name=judul-agenda]').val();
    var deskripsi = tinymce.get('deskripsi-agenda').getContent();
    var tanggalMulai = $('input[name=tanggal-mulai]').val();
    var tanggalSelesai = $('input[name=tanggal-selesai]').val();
    var lokasi = $('input[name=lokasi]').val();
    var jamMulai = $('input[name=jam-mulai]').val();
    var jamSelesai = $('input[name=jam-selesai]').val();
    var jam = jamMulai + ' - ' + jamSelesai;
    var gambar = $('#file-upload')[0].files[0];
    formData.append('judul', judul);
    formData.append('deskripsi', deskripsi);
    formData.append('tanggal_mulai', tanggalMulai);
    formData.append('tanggal_selesai', tanggalSelesai);
    formData.append('gambar', gambar);
    formData.append('lokasi', lokasi);
    formData.append('jam', jam);
    if(
      judul == "" || deskripsi == "" || tanggalMulai == "" || tanggalSelesai == "" || lokasi == "" ||
      jamMulai == "" || jamSelesai == "" || gambar == null
    ) {
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
  			url: 'agenda',
  			data: formData,
  			contentType: false,
  			processData: false,
  			success: function(data) {
  				if(data.status == 'ok') {
            Swal.fire({
    					icon: 'success',
    					title: 'Sukses',
    					text: 'Berhasil Menambahkan Agenda',
    					timer: 1200,
    					showConfirmButton: false
    				});
            $('#form-tambah-agenda').trigger('reset');
            $('#AgendaModal .close').click();
            loadDataAgenda();
          } else if(data.status == 'no_insert') {
            Swal.fire({
    					icon: 'error',
    					title: 'Gagal',
    					text: 'Gagal Menambahkan Pengumuman',
    					timer: 1200,
    					showConfirmButton: false
    				});
          } else if(data.status == 'not_valid_image') {
            Swal.fire({
    					icon: 'error',
    					title: 'Gagal',
    					text: 'File harus gambar (png, jpg, png, gif, svg)',
    					timer: 1200,
    					showConfirmButton: false
    				});
          }
  			},
        error: function(data) {
          console.log(data.error);
        }
  		});
    }
  });

  //edit agenda
  $('body').on('click', '.btn-edit-agenda', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var host = window.location.origin;
    $('input[name=edit-id]').val(id);
    $.ajax({
      type: 'GET',
      url: 'agenda/edit/' + id,
      contentType: false,
      processData: false,
      success: function(data) {
        $('#editAgendaModal').modal('show');
        // $('#image-edit-berita').attr('src', host + '/' + data.data.gambar);
        $('#judul-agenda-edit').val(data.data.judul);
        $('#jam_mulai_edit').val(data.data.jam_agenda);
        tinymce.get('deskripsi_agenda_edit').setContent(data.data.deskripsi);
      }
    });
  });

  $('body').on('submit', '#form-edit-agenda', function(e) {
    e.preventDefault();
    var data = $('#form-edit-agenda').serialize();
    var gambar = $('#file-upload-edit')[0].files[0];
    $.ajax({
      type: 'GET',
      url: 'agenda/edit/' + id,
      data: {
        data: data,
        gambar: gambar
      },
      contentType: false,
      processData: false,
      success: function(data) {

      }
    });

  });

});
