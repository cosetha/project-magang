$(document).ready(function() {
	LoadTableKerjasama();
	function LoadTableKerjasama() {
		$('#datatable-kerjasama').load('/load/table-kerjasama', function() {
			$('#tbl-kerjasama').DataTable({
				columnDefs: [ { className: 'align-middle', targets: '_all' } ],
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-kerjasama',
					type: 'get'
				},
				columns: [
					{
						data: 'DT_RowIndex',
						name: 'DT_RowIndex',
						searchable: false
					},
					{
						data: 'perusahaan',
						name: 'perusahaan'
					},
					{
						data: 'caption',
						name: 'caption'
					},
					{
						data: 'link',
						name: 'link'
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

	//TAMBAH JAWABAN
	$('body').on('submit', '#form-kerjasama', function(e) {
		e.preventDefault();
		$('.btn-close').css('display', 'none');
		$('.btn-loading').css('display', '');
		$('#btn-submit-kerjasama').css('display', 'none');
		var formData = new FormData();
		var perusahaan = $('input[name=perusahaan]').val();
		var link = $('input[name=link]').val();
		var caption = $('input[name=caption]').val();
		var token = $('input[name=token]').val();
		formData.append('_token', token);
		formData.append('perusahaan', perusahaan);
		formData.append('link', link);
		formData.append('caption', caption);
		formData.append('gambar', $('input[type=file]')[0].files[0]);
		$.ajax({
			type: 'post',
			url: '/admin/tambah-kerjasama',
			data: formData,
			processData: false,
			contentType: false,
			accepts: 'application / json',
			success: function(response) {
				$('.btn-close').css('display', '');
				$('.btn-loading').css('display', 'none');
				$('#btn-submit-kerjasama').css('display', '');

				LoadTableKerjasama();
				if (response.hasOwnProperty('error')) {
					Swal.fire({
						icon: 'error',
						title: 'Ooopss...',
						text: response.error,
						timer: 3000,
						showConfirmButton: false
					});
				} else {
					$('#KerjasamaModal').modal('hide');
					$('#form-kerjasama').trigger('reset');
					$('#blah').attr('src', '');
					Swal.fire({
						icon: 'success',
						title: response.message,
						text: 'Berhasil Menambahkan Kerja Sama',
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

	$('body').on('click', '.btn-delete-kerjasama', function(e) {
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
					url: '/admin/delete-kerjasama/' + id,
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
								text: 'Berhasil Menghapus Kerja Sama' + nama,
								timer: 2000,
								showConfirmButton: false
							});
						}
						LoadTableKerjasama();
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
	});

	$('body').on('click', '.btn-edit-kerjasama', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		$.ajax({
			url: '/admin/edit-kerjasama/' + id,
			type: 'GET',
			success: function(res) {
				$('#editKerjasamaModal').modal({
					backdrop: 'static',
					keyboard: false
				});
				$('#editKerjasamaModal').modal('show');
				$('#btn-save-kerjasama').css('display', '');
				$('input[name=edit-id]').val(id);
				$('#perusahaan-edit').val(res.values.perusahaan);
				$('#link-edit').val(res.values.link);
				$('#caption-edit').val(res.values.caption);
				if (res.values.gambar) {
					$('#blah-edit').attr('src', res.values.gambar);
				}
			}
		});
		return false;
	});
	$('body').on('submit', '#form-kerjasama-edit', function(e) {
		e.preventDefault();
		$('.btn-close-edit').css('display', 'none');
		$('.btn-loading-edit').css('display', '');
		$('#btn-save-kerjasama').css('display', 'none');
		var formData = new FormData();
		var perusahaan = $('input[name=perusahaan-edit]').val();
		var link = $('input[name=link-edit]').val();
		var caption = $('input[name=caption-edit]').val();
		var token = $('input[name=token]').val();
		var id = $('input[name=edit-id]').val();
		formData.append('_token', token);
		formData.append('perusahaan', perusahaan);
		formData.append('link', link);
		formData.append('caption', caption);
		if ($('#gambar-edit').get(0).files.length != 0) {
			formData.append('gambar', $('input[type=file]')[1].files[0]);
		}
		$.ajax({
			type: 'POST',
			url: '/admin/konfirmasi-edit-kerjasama/' + id,
			data: formData,
			processData: false,
			contentType: false,
			success: function(response) {
				$('.btn-close-edit').css('display', '');
				$('.btn-loading-edit').css('display', 'none');
				$('#btn-save-kerjasama').css('display', '');
				if (response.hasOwnProperty('error')) {
					console.log(response.error);
					Swal.fire({
						icon: 'error',
						title: 'Ooopss...',
						text: response.error,
						timer: 1200,
						showConfirmButton: false
					});
				} else {
					$('#editKerjasamaModal').modal('hide');
					$('#form-kerjasama-edit').trigger('reset');
					$('#blah-edit').attr('src', '');
					LoadTableKerjasama();
					Swal.fire({
						icon: 'success',
						title: response.message,
						text: 'Berhasil Mengedit Kerjasama',
						timer: 1200,
						showConfirmButton: false
					});
				}
			},
			error: function(err) {
				console.log(err);
			}
		});
		return false;
	});
});
