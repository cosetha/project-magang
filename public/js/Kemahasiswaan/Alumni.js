$(document).ready(function() {
	LoadTableAlumni();
	function LoadTableAlumni() {
		$('#datatable-alumni').load('/load/table-alumni', function() {
			$('#tbl-alumni').DataTable({
				columnDefs: [ { className: 'align-middle', targets: '_all' } ],
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-alumni',
					type: 'get'
				},
				columns: [
					{
						data: 'DT_RowIndex',
						name: 'DT_RowIndex',
						searchable: false
					},
					{
						data: 'nama_alumni',
						name: 'nama_alumni'
					},

					{
						data: 'bidang_keahlian',
						render: function(data, type, row) {
							//return data.length;
							var txt = '';
							data.forEach(function(item) {
								if (txt.length > 0) {
									txt += ', ';
								}
								txt += item.nama_bk;
							});
							return txt;
						}
					},
					{
						data: 'tahun_angkatan',
						name: 'tahun_angkatan'
					},
					{
						data: 'tgl_lulus',
						name: 'tgl_lulus'
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
	$('body').on('submit', '#form-alumni', function(e) {
		e.preventDefault();
		$('.btn-close').css('display', 'none');
		$('.btn-loading').css('display', '');
		$('#btn-submit-alumni').css('display', 'none');
		var formData = new FormData();
		var nama = $('input[name=nama]').val();
		var lulus = $('input[name=lulus]').val();
		var angkatan = $('input[name=angkatan]').val();
		var bk = $('#bk').val();
		var token = $('input[name=_token]').val();
		formData.append('_token', token);
		formData.append('nama', nama);
		formData.append('lulus', lulus);
		formData.append('angkatan', angkatan);
		formData.append('bk', bk);
		var c = lulus - angkatan;
		if (c <= 0) {
			$('.btn-close').css('display', '');
			$('.btn-loading').css('display', 'none');
			$('#btn-submit-alumni').css('display', '');
			LoadTableAlumni();
			Swal.fire({
				icon: 'error',
				title: 'Ooopss...',
				text: 'Tahun Lulus tidak valid',
				timer: 3000,
				showConfirmButton: false
			});
			return false;
		} else {
			$.ajax({
				type: 'post',
				url: '/admin/tambah-alumni',
				data: formData,
				processData: false,
				contentType: false,
				accepts: 'application / json',
				success: function(response) {
					$('.btn-close').css('display', '');
					$('.btn-loading').css('display', 'none');
					$('#btn-submit-alumni').css('display', '');
					LoadTableAlumni();
					if (response.hasOwnProperty('error')) {
						Swal.fire({
							icon: 'error',
							title: 'Ooopss...',
							text: response.error,
							timer: 3000,
							showConfirmButton: false
						});
					} else {
						$('#AlumniModal').modal('hide');
						$('#form-alumni').trigger('reset');
						Swal.fire({
							icon: 'success',
							title: response.message,
							text: 'Berhasil Menambahkan Alumni',
							timer: 2000,
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

	$('body').on('click', '.btn-delete-alumni', function(e) {
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
					url: '/admin/delete-alumni/' + id,
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
								text: 'Berhasil Menghapus Alumni' + nama,
								timer: 2000,
								showConfirmButton: false
							});
						}
						LoadTableAlumni();
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
	});

	$('body').on('click', '.btn-edit-alumni', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		console.log(id);
		$.ajax({
			url: '/admin/edit-alumni/' + id,
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
					$('#editAlumniModal').modal({
						backdrop: 'static',
						keyboard: false
					});
					$('#editAlumniModal').modal('show');
					$('#btn-save-alumni').css('display', '');
					$('input[name=id-edit]').val(id);
					$('#nama-edit').val(res.values.nama_alumni);
					$('#bk-edit').val(res.values.kode_bk);
					$('#angkatan-edit').val(res.values.tahun_angkatan);
					$('#lulus-edit').val(res.values.tgl_lulus);
				}
			}
		});
		return false;
	});
	$('body').on('submit', '#form-alumni-edit', function(e) {
		e.preventDefault();
		$('.btn-close-edit').css('display', 'none');
		$('.btn-loading-edit').css('display', '');
		$('#btn-save-alumni').css('display', 'none');
		var formData = new FormData();
		var formData = new FormData();
		var nama = $('input[name=nama-edit]').val();
		var lulus = $('input[name=lulus-edit]').val();
		var angkatan = $('input[name=angkatan-edit]').val();
		var bk = $('#bk-edit').val();
		var id = $('input[name=id-edit]').val();
		formData.append('_token', $('input[name=_token]').val());
		formData.append('nama', nama);
		formData.append('lulus', lulus);
		formData.append('angkatan', angkatan);
		formData.append('bk', bk);
		var c = lulus - angkatan;
		if (c < 0) {
			$('.btn-close-edit').css('display', '');
			$('.btn-loading-edit').css('display', 'none');
			$('#btn-save-alumni').css('display', '');
			Swal.fire({
				icon: 'error',
				title: 'Ooopss...',
				text: 'Tahun Lulus tidak valid',
				timer: 2000,
				showConfirmButton: false
			});
		} else {
			$.ajax({
				type: 'POST',
				url: '/admin/konfirmasi-edit-alumni/' + id,
				data: formData,
				processData: false,
				contentType: false,
				success: function(response) {
					$('.btn-close-edit').css('display', '');
					$('.btn-loading-edit').css('display', 'none');
					$('#btn-save-alumni').css('display', '');
					if (response.hasOwnProperty('error')) {
						Swal.fire({
							icon: 'error',
							title: 'Ooopss...',
							text: response.error,
							timer: 1800,
							showConfirmButton: false
						});
					} else {
						$('#editAlumniModal').modal('hide');
						$('#form-alumni-edit').trigger('reset');
						LoadTableAlumni();
						Swal.fire({
							icon: 'success',
							title: response.message,
							text: 'Berhasil Mengedit Alumni',
							timer: 1200,
							showConfirmButton: false
						});
					}
				},
				error: function(err) {
					console.log(err);
				}
			});
		}

		return false;
	});
});
