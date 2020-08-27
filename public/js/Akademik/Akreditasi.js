$(document).ready(function() {
	LoadTableAkreditasi();
	// Show Akreditasi
	function LoadTableAkreditasi() {
		$('#datatable-akreditasi').load('/load/table-akreditasi', function() {
			$('#akreditasi-table').DataTable({
				columnDefs: [ { className: 'align-middle', targets: '_all' } ],
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-akreditasi',
					type: 'get'
				},
				columns: [
					{
						data: 'DT_RowIndex',
						name: 'DT_RowIndex',
						searchable: false,
						orderable: false
					},

					{
						data: 'lembaga',
						name: 'lembaga'
					},

					{
						data: 'nilai',
						render: function(data, type, row) {
							return data.charAt(0).toUpperCase() + data.slice(1);
						}
					},

					{
						data: 'tanggal_mulai',
						name: 'tanggal_mulai'
					},

					{
						data: 'tanggal_selesai',
						name: 'tanggal_selesai'
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

	//Tambah Akreditasi
	$('body').on('submit', '#form-akreditasi', function(e) {
		e.preventDefault();
		$('.btn-close').css('display', 'none');
		$('.btn-loading').css('display', '');
		$('#btn-submit-akreditasi').css('display', 'none');
		var formData = new FormData();
		var lembaga = $('input[name=lembaga]').val();
		var nilai = $('#nilai').val();
		var tanggal_mulai = $('input[name=tanggal_mulai]').val();
		var tanggal_selesai = $('input[name=tanggal_selesai]').val();
		formData.append('lembaga', lembaga);
		formData.append('nilai', nilai);
		formData.append('tanggal_mulai', tanggal_mulai);
		formData.append('tanggal_selesai', tanggal_selesai);
		if (nilai != '' && lembaga != '' && tanggal_mulai != '' && tanggal_selesai != '') {
			$.ajax({
				type: 'post',
				url: '/admin/tambah-akreditasi',
				data: formData,
				processData: false,
				contentType: false,
				accepts: 'application / json',
				success: function(response) {
					$('#AkreditasiModal').modal('hide');
					$('#form-akreditasi').trigger('reset');
					$('.btn-close').css('display', '');
					$('.btn-loading').css('display', 'none');
					$('#btn-submit-akreditasi').css('display', '');
					LoadTableAkreditasi();
					if (response.hasOwnProperty('error')) {
						Swal.fire({
							icon: 'error',
							title: 'Ooopss...',
							text: response.error,
							timer: 3000,
							showConfirmButton: false
						});
					} else {
						Swal.fire({
							icon: 'success',
							title: response.message,
							text: 'Berhasil Menambahkan Akreditasi',
							timer: 2000,
							showConfirmButton: false
						});
					}
				},
				error: function(err) {
					console.log(err);
				}
			});
		} else {
			$('.btn-close').css('display', '');
			$('.btn-loading').css('display', 'none');
			$('#btn-submit-akreditasi').css('display', '');
			LoadTableAkreditasi();
			Swal.fire({
				icon: 'error',
				title: 'Ooopss...',
				text: 'Semua Field Harus di Isi',
				timer: 3000,
				showConfirmButton: false
			});
		}
	});

	// Edit Akreditasi
	$('body').on('click', '.btn-edit-akreditasi', function(e) {
		e.preventDefault();
		$('#akreditasi-edit').attr('disabled', false);
		$('#btn-save-akreditasi').css('display', '');
		var id = $(this).attr('data-id');
		console.log(id);
		$.ajax({
			url: '/admin/edit-akreditasi/' + id,
			type: 'GET',
			success: function(res) {
				if (res.hasOwnProperty('error')) {
					Swal.fire({
						icon: 'error',
						title: 'Ooopss...',
						text: response.error,
						timer: 1200,
						showConfirmButton: false
					});
				} else {
					$('#modal-title-akreditasi').html('Edit Akreditasi');
					$('#editAkreditasiModal').modal({
						backdrop: 'static',
						keyboard: false
					});
					$('#editAkreditasiModal').modal('show');
					$('#btn-save-akreditasi').css('display', '');
					$('input[name=id-edit]').val(id);
					$('#lembaga-edit').val(res.values.lembaga);
					$('#nilai-edit').val(res.values.nilai);
					$('#tanggal_mulai-edit').val(res.values.tanggal_mulai);
					$('#tanggal_selesai-edit').val(res.values.tanggal_selesai);
					
				}
			}
		});
		return false;
	});

	// Update Akreditasi
	$('body').on('submit', '#form-akreditasi-edit', function(e) {
		e.preventDefault();
		$('.btn-close-edit').css('display', 'none');
		$('.btn-loading-edit').css('display', '');
		$('#btn-save-akreditasi').css('display', 'none');
		var formData = new FormData();
		var lembaga = $('input[name=lembaga-edit]').val();
		var nilai = $('#nilai-edit').val();
		var tanggal_mulai = $('input[name=tanggal_mulai-edit]').val();
		var tanggal_selesai = $('input[name=tanggal_selesai-edit]').val();
		
		var id = $('input[name=id-edit]').val();
		formData.append('lembaga', lembaga);
		formData.append('nilai', nilai);
		formData.append('tanggal_mulai', tanggal_mulai);
		formData.append('tanggal_selesai', tanggal_selesai);
		
		if (nilai != '' && lembaga != '' && tanggal_mulai != '' && tanggal_selesai != '') {
			$.ajax({
				type: 'POST',
				url: '/admin/konfirmasi-edit-akreditasi/' + id,
				data: formData,
				processData: false,
				contentType: false,
				success: function(response) {
					$('#editAkreditasiModal').modal('hide');
					$('#form-akreditasi-edit').trigger('reset');
					$('.btn-close-edit').css('display', '');
					$('.btn-loading-edit').css('display', 'none');
					$('#btn-save-akreditasi').css('display', '');
					if (response.hasOwnProperty('error')) {
						Swal.fire({
							icon: 'error',
							title: 'Ooopss...',
							text: response.error,
							timer: 1200,
							showConfirmButton: false
						});
					} else {
						LoadTableAkreditasi();
						Swal.fire({
							icon: 'success',
							title: response.message,
							text: 'Berhasil Mengedit Akreditasi',
							timer: 1200,
							showConfirmButton: false
						});
					}
				},
				error: function(err) {
					console.log(err);
				}
			});
		} else {
			$('#editAkreditasiModal').modal('hide');
			$('#form-akreditasi-edit').trigger('reset');
			$('.btn-close-edit').css('display', '');
			$('.btn-loading-edit').css('display', 'none');
			$('#btn-save-akreditasi').css('display', '');
			LoadTableAkreditasi();
			Swal.fire({
				icon: 'error',
				title: 'Ooopss...',
				text: 'Semua Field Harus di Isi',
				timer: 3000,
				showConfirmButton: false
			});
		}

		return false;
	});

	// Delete Akreditasi
	$('body').on('click', '.btn-delete-akreditasi', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		var lembaga = $(this).attr('data-lembaga');
		Swal.fire({
			title: 'Hapus ' + lembaga + '?',
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
					url: '/admin/delete-akreditasi/' + id,
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
								text: 'Berhasil Menghapus ' + lembaga,
								timer: 2000,
								showConfirmButton: false
							});
						}
						LoadTableAkreditasi();
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
	});
});
