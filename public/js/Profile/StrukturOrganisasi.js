$(document).ready(function() {
	//DATATABLE
	LoadStrukturOrganisasi();
	function LoadStrukturOrganisasi() {
		AlertCount();
		$('#datatable-struktur-organisasi').load('/load/table-so', function() {
			$('#tbl-struktur-organisasi').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-so',
					type: 'get'
				},
				columns: [
					{
						data: 'DT_RowIndex',
						name: 'DT_RowIndex',
						searchable: false
					},
					{
						data: 'judul',
						name: 'judul'
					},
					{
						data: 'gambar',
						render: function(data, type, row) {
							return '<img  class = "rounded mx-auto d-block" height="200px" src="' + data + '" />';
						}
					},
					{
						data: 'aksi',
						name: 'aksi',
						searchable: false,
						orderable: false
					}
				]
			});
		});
	}

	//OPEN MODAL ADD
	$('#btn-modal-so').on('click', function(e) {
		e.preventDefault();
		$('#StrukturorganisasiModal').modal('show');
	});

	//SUBMIT
	$('body').on('submit', '#FormAddSO', function(e) {
		e.preventDefault();
		$('.btn-close').css('display', 'none');
		$('.btn-loading').css('display', '');
		$('#btn-submit-so').css('display', 'none');

		var formData = new FormData();
		var nama = $('input[name=nama]').val();
		var deskripsi = tinymce.get('deskripsi').getContent();
		var token = $('input[name=token]').val();
		formData.append('_token', token);
		formData.append('nama', nama);
		formData.append('deskripsi', deskripsi);
		formData.append('gambar', $('input[type=file]')[0].files[0]);
		$.ajax({
			type: 'post',
			url: '/admin/tambah-struktur-organisasi',
			data: formData,
			processData: false,
			contentType: false,
			success: function(response) {

                if(response.hasOwnProperty('error')){
                    $('.btn-close').css('display', '');
                    $('.btn-loading').css('display', 'none');
                    $('#btn-submit-so').css('display', '');
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.error
                    });
                }else{
                    $('#StrukturorganisasiModal').modal('hide');
                    $('#FormAddSO').trigger('reset');
                    $('.btn-close').css('display', '');
                    $('.btn-loading').css('display', 'none');
                    $('#btn-submit-so').css('display', '');
                    LoadStrukturOrganisasi();
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Berhasil Menambahkan Struktur Organisasi',
                        timer: 1200,
                        showConfirmButton: false
                    });
                }

			},
			error: function(err) {
				console.log(err);
			}
		});
	});

	//OPEN MODAL EDIT
	$('body').on('click', '.btn-edit-so', function() {
		$('#editStrukturorganisasiModal').modal('show');
		$('#edit-nama-so').attr('disabled', false);
		$('.btn-save-so').css('display', '');
		$('#file-upload-edit').css('display', '');
		tinymce.get('edit-deskripsi').setMode('design');
		var id = $(this).attr('data-id');
		$.ajax({
			type: 'get',
			url: '/get-data-so/' + id,
			success: function(response) {
				console.log(response.data.id);
				$('#id-so').val(response.data.id);
				$('#edit-nama-so').val(response.data.judul);
				tinymce.get('edit-deskripsi').setContent(response.data.deskripsi);
				$('#blah').attr('src', '');
			},
			error: function(err) {
				console.log(err);
			}
		});
	});
	$('body').on('click', '.btn-show-so', function() {
		$('#editStrukturorganisasiModal').modal('show');
		var id = $(this).attr('data-id');
		$.ajax({
			type: 'get',
			url: '/get-data-so/' + id,
			success: function(response) {
				console.log(response.data.id);
				$('#id-so').val(response.data.id);
				$('#edit-nama-so').val(response.data.judul);
				tinymce.get('edit-deskripsi').setContent(response.data.deskripsi);
				$('#edit-nama-so').attr('disabled', true);
				$('#file-upload-edit').css('display', 'none');
				tinymce.get('edit-deskripsi').setMode('readonly');
				$('.btn-save-so').css('display', 'none');
				if (response.data.gambar) {
					$('#blah').show();
					$('#blah').attr('src', response.data.gambar);
				}
			},
			error: function(err) {
				console.log(err);
			}
		});
	});
	//SAVE EDIT
	$('body').on('submit', '#FormEditSO', function(e) {
		e.preventDefault();
		$('.btn-close').css('display', 'none');
		$('.btn-loading').css('display', '');
		$('.btn-save-so').css('display', 'none');

		var id = $('#id-so').val();

		var formData = new FormData();
		var nama = $('#edit-nama-so').val();
		console.log(nama);
		var deskripsi = tinymce.get('edit-deskripsi').getContent();
		console.log(deskripsi);
		var token = $('input[name=token]').val();
		formData.append('_token', token);
		formData.append('nama', nama);
		formData.append('deskripsi', deskripsi);
		formData.append('gambar', $('input[type=file]')[1].files[0]);
		$.ajax({
			type: 'post',
			url: '/admin/edit-struktur-organisasi/' + id,
			data: formData,
			processData: false,
			contentType: false,
			success: function(response) {

                if(response.hasOwnProperty('error')){
                    $('.btn-close').css('display', '');
                    $('.btn-loading').css('display', 'none');
                    $('.btn-save-so').css('display', '');
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.error
                    });
                }else{
                    $('.btn-close').css('display', '');
                    $('.btn-loading').css('display', 'none');
                    $('.btn-save-so').css('display', '');
                    $('#FormEditSO').trigger('reset');
                    $('#editStrukturorganisasiModal').modal('hide');
                    LoadStrukturOrganisasi();
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Berhasil Mengedit Struktur Organisasi',
                        timer: 1200,
                        showConfirmButton: false
                    });
                }

			},
			error: function(err) {
				console.log(err);
			}
		});
	});

	//DELETE
	$('body').on('click', '.btn-delete-so', function() {
		var id = $(this).attr('data-id');
		var nama = $(this).attr('data-nama');

		Swal.fire({
			title: 'Hapus ' + nama + '?',
			text: 'Anda tidak dapat mengurungkan aksi ini!',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'get',
					url: '/admin/delete-struktur-organisasi/' + id,
					success: function(response) {
						Swal.fire('Deleted!', nama + ' telah dihapus.', 'success');
						LoadStrukturOrganisasi();
					},
					error: function(err) {
						console.log(err);
					}
				});
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
