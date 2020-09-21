$(document).ready(function() {
	LoadTableHeadLine();
	function LoadTableHeadLine() {
		AlertCount();
		$('#datatable-headline').load('/load/table-headline', function() {
			$('#tbl-headline').DataTable({
				columnDefs: [ { className: 'align-middle', targets: '_all' } ],
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-headline',
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
						data: 'caption',
						name: 'caption'
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
	$('body').on('submit', '#form-headline', function(e) {
		e.preventDefault();
		$('.btn-close').css('display', 'none');
		$('.btn-loading').css('display', '');
		$('#btn-submit-headline').css('display', 'none');
		var formData = new FormData();
		var judul = $('input[name=judul]').val();
		var caption = $('input[name=caption]').val();
		var token = $('input[name=token]').val();
		console.log(judul);
		formData.append('_token', token);
		formData.append('judul', judul);
		formData.append('caption', caption);
		formData.append('gambar', $('input[type=file]')[0].files[0]);
		$.ajax({
			type: 'post',
			url: '/admin/tambah-headline',
			data: formData,
			processData: false,
			contentType: false,
			accepts: 'application / json',
			success: function(response) {
				$('.btn-close').css('display', '');
				$('.btn-loading').css('display', 'none');
				$('#btn-submit-headline').css('display', '');
				LoadTableHeadLine();
				if (response.hasOwnProperty('error')) {
					Swal.fire({
						icon: 'error',
						title: 'Ooopss...',
						text: response.error,
						timer: 1200,
						showConfirmButton: false
					});
				} else {
					$('#HeadlineModal').modal('hide');
					$('#form-headline').trigger('reset');
					$('#blah').attr('src', '');
					Swal.fire({
						icon: 'success',
						title: response.message,
						text: 'Berhasil Menambahkan Headline',
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

	$('body').on('click', '.btn-delete-headline', function(e) {
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
					url: '/admin/delete-headline/' + id,
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
								text: 'Berhasil Menghapus Headline' + nama,
								timer: 2000,
								showConfirmButton: false
							});
						}
						LoadTableHeadLine();
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
	});

	$('body').on('click', '.btn-edit-headline', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		$.ajax({
			url: '/admin/edit-headline/' + id,
			type: 'GET',
			success: function(res) {
				$('#HeadlineModalEdit').modal({ backdrop: 'static', keyboard: false });
				$('#HeadlineModalEdit').modal('show');
				$('#btn-save-headline').css('display', '');
				$('input[name=edit-id]').val(id);
				$('#edit-judul').val(res.values.judul);
				$('#edit-caption').val(res.values.caption);
				if (res.values.gambar) {
					$('#blah-edit').attr('src', res.values.gambar);
				}
			}
		});
		return false;
	});
	$('body').on('submit', '#form-headline-edit', function(e) {
		e.preventDefault();
		$('.btn-close-edit').css('display', 'none');
		$('.btn-loading-edit').css('display', '');
		$('#btn-save-headline').css('display', 'none');
		var formData = new FormData();
		var judul = $('input[name=edit-judul]').val();
		var caption = $('input[name=edit-caption]').val();
		var token = $('input[name=token]').val();
		var id = $('input[name=edit-id]').val();
		formData.append('_token', token);
		formData.append('judul', judul);
		formData.append('caption', caption);
		if ($('#edit-gambar').get(0).files.length != 0) {
			formData.append('gambar', $('input[type=file]')[1].files[0]);
		}
		$.ajax({
			type: 'POST',
			url: '/admin/konfirmasi-edit-headline/' + id,
			data: formData,
			processData: false,
			contentType: false,
			success: function(response) {
				$('.btn-close-edit').css('display', '');
				$('.btn-loading-edit').css('display', 'none');
				$('#btn-save-headline').css('display', '');
				if (response.hasOwnProperty('error')) {
					Swal.fire({
						icon: 'error',
						title: 'Ooopss...',
						text: response.error,
						timer: 1200,
						showConfirmButton: false
					});
				} else {
					$('#HeadlineModalEdit').modal('hide');
					$('#form-headline-edit').trigger('reset');
					$('#blah-edit').attr('src', '');
					LoadTableHeadLine();
					Swal.fire({
						icon: 'success',
						title: response.message,
						text: 'Berhasil Mengedit Headline',
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
