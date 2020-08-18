$(document).ready(function() {
	LoatTableSejarah();
	function LoatTableSejarah() {
		$('#datatable-sejarah').load('/load/table-sejarah', function() {
			$('#tbl-sejarah').DataTable({
				columnDefs: [ { className: 'align-middle', targets: '_all' } ],
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-sejarah',
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
						name: 'menu',
						searchable: false,
						orderable: false
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
	$('body').on('submit', '#form-sejarah', function(e) {
		e.preventDefault();
		$('.btn-close').css('display', 'none');
		$('.btn-loading').css('display', '');
		$('#btn-submit-sejarah').css('display', 'none');
		var formData = new FormData();
		var judul = $('input[name=judul]').val();
		var deskripsi = tinymce.get('deskripsi').getContent();
		var menu = $('input[name=menu]').val();
		var token = $('input[name=token]').val();
		formData.append('_token', token);
		formData.append('judul', judul);
		formData.append('deskripsi', deskripsi);
		formData.append('menu', menu);
		if (tinymce.get('deskripsi').getContent() == '') {
			$('.btn-close').css('display', '');
			$('.btn-loading').css('display', 'none');
			$('#btn-submit-sejarah').css('display', '');
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Field Deksripsi perlu di isi',
				timer: 1200,
				showConfirmButton: false
			});
		} else {
			$.ajax({
				type: 'post',
				url: '/admin/tambah-sejarah',
				data: formData,
				processData: false,
				contentType: false,
				accepts: 'application / json',
				success: function(response) {
					$('#SejarahModal').modal('hide');
					$('#form-sejarah').trigger('reset');
					$('.btn-close').css('display', '');
					$('.btn-loading').css('display', 'none');
					$('#btn-submit-sejarah').css('display', '');
					LoatTableSejarah();
					if (response.hasOwnProperty('error')) {
						Swal.fire({
							icon: 'error',
							title: 'Ooopss...',
							text: Object.keys(response.error),
							timer: 2200,
							showConfirmButton: false
						});
						console.log(Object.keys(response.error));
					} else {
						Swal.fire({
							icon: 'success',
							title: response.message,
							text: 'Berhasil MenambahkanSejarah',
							timer: 1000,
							showConfirmButton: false
						});
					}
				},
				error: function(err) {
					console.log(err);
				}
			});
		}
	});

	$('body').on('click', '.btn-delete-sejarah', function(e) {
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
					url: '/admin/delete-sejarah/' + id,
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
								text: 'Berhasil MenghapusSejarah ' + nama,
								timer: 2000,
								showConfirmButton: false
							});
						}
						LoatTableSejarah();
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
	});

	$('body').on('click', '.btn-edit-sejarah', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		$('.btn-close-edit').css('display', '');
		$('.btn-loading-edit').css('display', 'none');
		$('#btn-save-sejarah').css('display', '');
		$('#judul-edit').attr('disabled', false);
		tinymce.get('deskripsi-edit').setMode('design');
		$.ajax({
			url: '/admin/edit-sejarah/' + id,
			type: 'GET',
			success: function(res) {
				$('#editSejarahModal').modal({ backdrop: 'static', keyboard: false });
				$('#editSejarahModal').modal('show');
				$('#modal-title-sejarah-edit').html('Edit Sejarah');
				$('#btn-save-sejarah').css('display', '');
				$('input[name=id-edit]').val(id);
				$('#judul-edit').val(res.values.judul);
				$('#menu-edit').val(res.values.menu);
				tinymce.get('deskripsi-edit').setContent(res.values.deskripsi);
			}
		});
		return false;
	});

	$('body').on('click', '.btn-show-sejarah', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		$('.btn-close-edit').css('display', '');
		$('.btn-loading-edit').css('display', 'none');
		$('#btn-save-sejarah').css('display', 'none');
		$.ajax({
			url: '/admin/edit-sejarah/' + id,
			type: 'GET',
			success: function(res) {
				$('#editSejarahModal').modal({ backdrop: 'static', keyboard: false });
				$('#editSejarahModal').modal('show');
				$('#modal-title-sejarah-edit').html('Detail Sejarah');
				$('#btn-simpan-sejarah').css('display', '');
				$('input[name=id-edit]').val(id);
				$('#judul-edit').val(res.values.judul);
				$('#menu-edit').val(res.values.menu);
				tinymce.get('deskripsi-edit').setContent(res.values.deskripsi);
				$('#judul-edit').attr('disabled', true);
				tinymce.get('deskripsi-edit').setMode('readonly');
			}
		});
		return false;
	});

	$('body').on('submit', '#form-sejarah-edit', function(e) {
		e.preventDefault();
		$('.btn-close-edit').css('display', 'none');
		$('.btn-loading-edit').css('display', '');
		$('#btn-save-sejarah').css('display', 'none');
		var formData = new FormData();
		var judul = $('input[name=judul-edit]').val();
		var deskripsi = tinymce.get('deskripsi-edit').getContent();
		var menu = $('input[name=menu-edit]').val();
		var token = $('input[name=token]').val();
		var id = $('input[name=id-edit]').val();
		formData.append('_token', token);
		formData.append('judul', judul);
		formData.append('deskripsi', deskripsi);
		formData.append('menu', menu);
		if (tinymce.get('deskripsi-edit').getContent() == '') {
			$('.btn-close-edit').css('display', '');
			$('.btn-loading-edit').css('display', 'none');
			$('#btn-save-sejarah').css('display', '');
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Field Deksripsi perlu di isi',
				timer: 1200,
				showConfirmButton: false
			});
		} else {
			$.ajax({
				type: 'POST',
				url: '/admin/konfirmasi-edit-sejarah/' + id,
				data: formData,
				processData: false,
				contentType: false,
				success: function(response) {
					$('#editSejarahModal').modal('hide');
					$('#form-sejarah-edit').trigger('reset');
					$('.btn-close-edit').css('display', '');
					$('.btn-loading-edit').css('display', 'none');
					$('#btn-save-sejarah').css('display', '');
					LoatTableSejarah();
					Swal.fire({
						icon: 'success',
						title: response.message,
						text: 'Berhasil MengeditSejarah',
						timer: 1200,
						showConfirmButton: false
					});
				},
				error: function(err) {
					console.log(err);
				}
			});
		}

		return false;
	});
});
