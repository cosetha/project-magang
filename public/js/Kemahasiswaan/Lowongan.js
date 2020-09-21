$(document).ready(function() {
	LoadTableLowongan();
	function LoadTableLowongan() {
		AlertCount();
		$('#datatable-lowongan').load('/load/table-lowongan', function() {
			$('#tbl-lowongan').DataTable({
				columnDefs: [ { className: 'align-middle', targets: '_all' } ],
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-lowongan',
					type: 'get'
				},
				columns: [
					{
						data: 'DT_RowIndex',
						name: 'DT_RowIndex',
						searchable: false
					},
					{
						data: 'nama_lowongan',
						name: 'nama_lowongan'
					},

					{
						data: 'jenis',
						render: function(data, type, row) {
							return data.charAt(0).toUpperCase() + data.slice(1);
						}
					},
					{
						data: 'gambar',
						render: function(data, type, row) {
							return '<img  class = "rounded mx-auto d-block" height="100px" src="' + data + '" />';
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
	$('body').on('submit', '#form-lowongan', function(e) {
		e.preventDefault();
		$('.btn-close').css('display', 'none');
		$('.btn-loading').css('display', '');
		$('#btn-submit-lowongan').css('display', 'none');
		var formData = new FormData();
		var nama = $('input[name=nama]').val();
		var deskripsi = tinymce.get('deskripsi').getContent();
		var jenis = $('#jenis').val();
		var token = $('input[name=_token]').val();
		formData.append('_token', token);
		formData.append('nama', nama);
		formData.append('deskripsi', deskripsi);
		formData.append('jenis', jenis);
		formData.append('gambar', $('input[type=file]')[0].files[0]);
		$.ajax({
			type: 'post',
			url: '/admin/tambah-lowongan',
			data: formData,
			processData: false,
			contentType: false,
			accepts: 'application / json',
			success: function(response) {
				$('.btn-close').css('display', '');
				$('.btn-loading').css('display', 'none');
				$('#btn-submit-lowongan').css('display', '');
				$('#blah').attr('src', '');
				if (response.hasOwnProperty('error')) {
					Swal.fire({
						icon: 'error',
						title: 'Ooopss...',
						text: response.error,
						timer: 3000,
						showConfirmButton: false
					});
				} else {
					$('#LowonganModal').modal('hide');
					$('#form-lowongan').trigger('reset');
					LoadTableLowongan();
					Swal.fire({
						icon: 'success',
						title: response.message,
						text: 'Berhasil Menambahkan Lowongan',
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

	$('body').on('click', '.btn-delete-lowongan', function(e) {
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
					url: '/admin/delete-lowongan/' + id,
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
								text: 'Berhasil Menghapus Lowongan' + nama,
								timer: 2000,
								showConfirmButton: false
							});
						}
						LoadTableLowongan();
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
	});

	$('body').on('click', '.btn-edit-lowongan', function(e) {
		e.preventDefault();
		$('#lowongan-edit').attr('disabled', false);
		$('#nama-edit').prop('readonly', false);
		$('#btn-save-lowongan').css('display', '');
		$('#file-upload-edit').css('display', '');
		tinymce.get('deskripsi-edit').setMode('design');
		var id = $(this).attr('data-id');
		console.log(id);
		$.ajax({
			url: '/admin/edit-lowongan/' + id,
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
					$('#modal-title-lowongan').html('Edit Lowongan');
					$('#editLowonganModal').modal({
						backdrop: 'static',
						keyboard: false
					});
					$('#editLowonganModal').modal('show');
					$('#btn-save-lowongan').css('display', '');
					$('input[name=id-edit]').val(id);
					$('#nama-edit').val(res.values.nama_lowongan);
					tinymce.get('deskripsi-edit').setContent(res.values.deskripsi);
					$('#deskripsi-edit').val(res.values.akreditasi);
					$('#lowongan-edit').val(res.values.jenis);
					if (res.values.gambar) {
						$('#blah-edit').attr('src', res.values.gambar);
					}
				}
			}
		});
		return false;
	});

	$('body').on('click', '.btn-show-lowongan', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		$('#btn-save-lowongan').css('display', 'none');
		$('#file-upload-edit').css('display', 'none');
		$.ajax({
			url: '/admin/edit-lowongan/' + id,
			type: 'GET',
			success: function(res) {
				$('#modal-title-lowongan').html('Detail Lowongan');
				$('#editLowonganModal').modal({ backdrop: 'static', keyboard: false });
				$('#editLowonganModal').modal('show');
				$('input[name=edit-id]').val(id);
				$('#nama-edit').val(res.values.nama_lowongan);
				tinymce.get('deskripsi-edit').setContent(res.values.deskripsi);
				$('#lowongan-edit').val(res.values.jenis);
				if (res.values.gambar) {
					$('#blah-edit').attr('src', res.values.gambar);
				}
				$('#nama-edit').prop('readonly', true);
				tinymce.get('deskripsi-edit').setMode('readonly');
				$('#lowongan-edit').attr('disabled', true);
				$('#file-upload-edit').css('display', true);
				$('#nama-edit').prop('readonly', true);
				tinymce.get('deskripsi-edit').setMode('readonly');
			}
		});
		return false;
	});

	$('body').on('submit', '#form-lowongan-edit', function(e) {
		e.preventDefault();
		$('.btn-close-edit').css('display', 'none');
		$('.btn-loading-edit').css('display', '');
		$('#btn-save-lowongan').css('display', 'none');
		var formData = new FormData();
		var formData = new FormData();
		var nama = $('input[name=nama-edit]').val();
		var deskripsi = tinymce.get('deskripsi-edit').getContent();
		var jenis = $('#lowongan-edit').val();
		var id = $('input[name=id-edit]').val();
		formData.append('_token', $('input[name=_token]').val());
		formData.append('nama', nama);
		formData.append('deskripsi', deskripsi);
		formData.append('jenis', jenis);
		console.log(deskripsi);
		if ($('#file-upload-edit').get(0).files.length != 0) {
			formData.append('gambar', $('input[type=file]')[1].files[0]);
		}
		$.ajax({
			type: 'POST',
			url: '/admin/konfirmasi-edit-lowongan/' + id,
			data: formData,
			processData: false,
			contentType: false,
			success: function(response) {
				$('.btn-close-edit').css('display', '');
				$('.btn-loading-edit').css('display', 'none');
				$('#btn-save-lowongan').css('display', '');
				if (response.hasOwnProperty('error')) {
					Swal.fire({
						icon: 'error',
						title: 'Ooopss...',
						text: response.error,
						timer: 1200,
						showConfirmButton: false
					});
				} else {
					$('#editLowonganModal').modal('hide');
					$('#form-lowongan-edit').trigger('reset');
					LoadTableLowongan();
					Swal.fire({
						icon: 'success',
						title: response.message,
						text: 'Berhasil Mengedit Lowongan',
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
