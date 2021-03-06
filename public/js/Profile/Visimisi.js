$(document).ready(function() {
	LoadTableVisi();
	function LoadTableVisi() {
		AlertCount();
		$('#datatable-visimisi').load('/load/table-visimisi', function() {
			$('#tbl-visimisi').DataTable({
				columnDefs: [ { className: 'align-middle', targets: '_all' } ],
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-visimisi',
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
						data: 'status',
						name: 'status'
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
	$('body').on('submit', '#form-visimisi', function(e) {
		e.preventDefault();
		$('.btn-close').css('display', 'none');
		$('.btn-loading').css('display', '');
		$('#btn-submit-visimisi').css('display', 'none');
		var formData = new FormData();
		var judul = $('input[name=judul]').val();
		var deskripsi = tinymce.get('deskripsi').getContent();
		var menu = $('input[name=menu]').val();
		var token = $('input[name=token]').val();
		formData.append('_token', token);
		formData.append('judul', judul);
		formData.append('deskripsi', deskripsi);
		formData.append('menu', menu);
		$.ajax({
			type: 'post',
			url: '/admin/tambah-visimisi',
			data: formData,
			processData: false,
			contentType: false,
			accepts: 'application / json',
			success: function(response) {
				$('.btn-close').css('display', '');
				$('.btn-loading').css('display', 'none');
				$('#btn-submit-visimisi').css('display', '');
				if (response.hasOwnProperty('error')) {
					Swal.fire({
						icon: 'error',
						title: 'Ooopss...',
						text: response.error,
						timer: 2200,
						showConfirmButton: false
					});
				} else {
					$('#VisimisiModal').modal('hide');
					$('#form-visimisi').trigger('reset');
					LoadTableVisi();
					Swal.fire({
						icon: 'success',
						title: response.message,
						text: 'Berhasil Menambahkan Visi dan Misi',
						timer: 1000,
						showConfirmButton: false
					});
				}
			},
			error: function(err) {
				console.log(err);
			}
		});
	});

	$('body').on('click', '.btn-delete-visimisi', function(e) {
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
					url: '/admin/delete-visimisi/' + id,
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
								text: 'Berhasil Menghapus Visi dan Misi ' + nama,
								timer: 2000,
								showConfirmButton: false
							});
						}
						LoadTableVisi();
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
	});

	$('body').on('click', '.btn-edit-visimisi', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		$('.btn-close-edit').css('display', '');
		$('.btn-loading-edit').css('display', 'none');
		$('#btn-save-visimisi').css('display', '');
		$('#judul-edit').attr('disabled', false);
		tinymce.get('deskripsi-edit').setMode('design');
		$.ajax({
			url: '/admin/edit-visimisi/' + id,
			type: 'GET',
			success: function(res) {
				$('#editVisimisiModal').modal({ backdrop: 'static', keyboard: false });
				$('#editVisimisiModal').modal('show');
				$('#modal-title-visimisi-edit').html('Edit Visi dan Misi');
				$('#btn-save-visimisi').css('display', '');
				$('input[name=id-edit]').val(id);
				$('#judul-edit').val(res.values.judul);
				$('#menu-edit').val(res.values.menu);
				tinymce.get('deskripsi-edit').setContent(res.values.deskripsi);
			}
		});
		return false;
	});

	$('body').on('click', '.btn-show-visimisi', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		$('.btn-close-edit').css('display', '');
		$('.btn-loading-edit').css('display', 'none');
		$('#btn-save-visimisi').css('display', 'none');
		$.ajax({
			url: '/admin/edit-visimisi/' + id,
			type: 'GET',
			success: function(res) {
				$('#editVisimisiModal').modal({ backdrop: 'static', keyboard: false });
				$('#editVisimisiModal').modal('show');
				$('#modal-title-visimisi-edit').html('Detail Visi dan Misi');
				$('#btn-simpan-visimisi').css('display', '');
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

	$('body').on('submit', '#form-visimisi-edit', function(e) {
		e.preventDefault();
		$('.btn-close-edit').css('display', 'none');
		$('.btn-loading-edit').css('display', '');
		$('#btn-save-visimisi').css('display', 'none');
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
		$.ajax({
			type: 'POST',
			url: '/admin/konfirmasi-edit-visimisi/' + id,
			data: formData,
			processData: false,
			contentType: false,
			success: function(response) {
				$('.btn-close-edit').css('display', '');
				$('.btn-loading-edit').css('display', 'none');
				$('#btn-save-visimisi').css('display', '');

				if (response.hasOwnProperty('error')) {
					Swal.fire({
						icon: 'error',
						title: 'Ooopss...',
						text: response.error,
						timer: 1200,
						showConfirmButton: false
					});
				} else {
					$('#editVisimisiModal').modal('hide');
					$('#form-visimisi-edit').trigger('reset');
					LoadTableVisi();
					Swal.fire({
						icon: 'success',
						title: response.message,
						text: 'Berhasil Mengedit Visi dan Misi',
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
	$('body').on('click', '.btn-aktifkan-visi', function(e) {
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			type: 'get',
			url: '/aktifkan-visi/' + id,
			success: function(response) {
				LoadTableVisi();
				Swal.fire({
					icon: 'success',
					title: response.message,
					text: 'Visimisi di aktifkan',
					timer: 1200,
					showConfirmButton: false
				});
			},
			error: function(err) {
				console.log(err);
			}
		});
	});
	$('body').on('click', '.btn-non-aktifkan-visi', function(e) {
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			type: 'get',
			url: '/non-aktifkan-visi/' + id,
			success: function(response) {
				LoadTableVisi();
				Swal.fire({
					icon: 'success',
					title: response.message,
					text: 'Visimisi di Non-Aktifkan',
					timer: 1200,
					showConfirmButton: false
				});
			},
			error: function(err) {
				console.log(err);
			}
		});
	});

	//ALERT HISTORY COUNT
	function AlertCount() {
		$.ajax({
			type: 'get',
			url: '/count-today-history-alert',
			success: function(response) {
				$('#jumlah_history_today').html(response.total);
			},
			error: function(err) {
				console.log(err);
			}
		});
	}
});
