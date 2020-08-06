$(document).ready(function() {
	LoadTableKonten();
	function LoadTableKonten() {
		$('#datatable-konten').load('/load/table-konten', function() {
			$('#tbl-konten').DataTable({
				columnDefs: [ { className: 'align-middle', targets: '_all' } ],
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-konten',
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
						data: 'menu',
						name: 'menu'
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

	//TAMBAH JAWABAN
	$('body').on('submit', '#form-konten', function(e) {
		e.preventDefault();
		$('.btn-close').css('display', 'none');
		$('.btn-loading').css('display', '');
		$('#btn-submit-konten').css('display', 'none');
		var formData = new FormData();
		var judul = $('input[name=judul]').val();
		var deskripsi = tinymce.get('deskripsi').getContent();
		var menu = $('#menu option:selected').text();
		var token = $('input[name=token]').val();
		formData.append('_token', token);
		formData.append('judul', judul);
		formData.append('deskripsi', deskripsi);
		formData.append('menu', menu);
		$.ajax({
			type: 'post',
			url: '/admin/tambah-konten',
			data: formData,
			processData: false,
			contentType: false,
			accepts: 'application / json',
			success: function(response) {
				$('.modal-title-semester').html();
				$('#KontenModal').modal('hide');
				$('#form-konten').trigger('reset');
				$('.btn-close').css('display', '');
				$('.btn-loading').css('display', 'none');
				$('#btn-submit-konten').css('display', '');
				LoadTableKonten();
				if (response.hasOwnProperty('error')) {
					Swal.fire({
						icon: 'error',
						title: 'Ooopss...',
						text: response.error,
						timer: 1200,
						showConfirmButton: false
					});
				} else {
					Swal.fire({
						icon: 'success',
						title: response.message,
						text: 'Berhasil Menambahkan Konten',
						timer: 2000,
						showConfirmButton: false
					});
				}
			},
			error: function(err) {
				console.log(err);
			}
		});
	});

	$('body').on('click', '.btn-delete-konten', function(e) {
		e.preventDefault();
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
					accepts: 'application/json',
					type: 'get',
					url: '/admin/delete-konten/' + id,
					success: function(response) {
						if (response.hasOwnProperty('error')) {
							Swal.fire({
								icon: 'error',
								title: 'Ooopss...',
								text: response.error,
								timer: 1200,
								showConfirmButton: false
							});
						} else {
							Swal.fire({
								icon: 'success',
								title: response.message,
								text: 'Berhasil Menghapus Konten' + nama,
								timer: 2000,
								showConfirmButton: false
							});
						}
						LoadTableKonten();
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
	});

	$('body').on('click', '.btn-edit-konten', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		$.ajax({
			url: '/admin/edit-konten/' + id,
			type: 'GET',
			success: function(res) {
				$('#KontenModalEdit').modal({ backdrop: 'static', keyboard: false });
				$('#KontenModalEdit').modal('show');
				$('#btn-save-konten').css('display', '');
				$('input[name=edit-id]').val(id);
				$('#judul-edit').val(res.values.judul);
				$('#menu-edit').val(res.values.menu);
				tinymce.get('deskripsi-edit').setContent(res.values.deskripsi);
			}
		});
		return false;
	});
	$('body').on('submit', '#form-konten-edit', function(e) {
		e.preventDefault();
		$('.btn-close-edit').css('display', 'none');
		$('.btn-loading-edit').css('display', '');
		$('#btn-save-konten').css('display', 'none');
		var formData = new FormData();
		var judul = $('input[name=judul-edit]').val();
		var deskripsi = tinymce.get('deskripsi-edit').getContent();
		var menu = $('#menu-edit option:selected').text();
		var token = $('input[name=token]').val();
		var id = $('input[name=edit-id]').val();
		formData.append('_token', token);
		formData.append('judul', judul);
		formData.append('deskripsi', deskripsi);
		formData.append('menu', menu);
		$.ajax({
			type: 'POST',
			url: '/admin/konfirmasi-edit-konten/' + id,
			data: formData,
			processData: false,
			contentType: false,
			success: function(response) {
				$('#KontenModalEdit').modal('hide');
				$('#form-konten-edit').trigger('reset');
				$('.btn-close-edit').css('display', '');
				$('.btn-loading-edit').css('display', 'none');
				$('#btn-save-konten').css('display', '');
				LoadTableKonten();
				Swal.fire({
					icon: 'success',
					title: response.message,
					text: 'Berhasil Mengedit Konten',
					timer: 1200,
					showConfirmButton: false
				});
			},
			error: function(err) {
				console.log(err);
			}
		});
		return false;
	});
});
