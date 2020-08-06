$(document).ready(function() {
	//------------------------------------------FITUR JABATAN------------------------------------------

	//DATATABLE JABATAN
	LoadTableJabatan();
	function LoadTableJabatan() {
		$('#datatable-jabatan').load('/load/table-jabatan', function() {
			$('#tbl-jabatan').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-jabatan',
					type: 'get'
				},
				columns: [
					{
						data: 'DT_RowIndex',
						name: 'DT_RowIndex',
						searchable: false
					},
					{
						data: 'nama_jabatan',
						name: 'nama_jabatan'
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
	$('body').on('submit', '#form-tambah-jabatan', function(e) {
		e.preventDefault();
		$('.btn-close').css('display', 'none');
		$('.btn-loading').css('display', '');
		$('#btn-submit-jabatan').css('display', 'none');
		var data = $('#form-tambah-jabatan').serialize();
		$.ajax({
			type: 'post',
			url: '/admin/tambah-jabatan',
			data: data,
			success: function(response) {
				$('.modal-title-jabatan').html();
				$('#TambahJabatanModal').modal('hide');
				$('#form-tambah-jabatan').trigger('reset');
				$('.btn-close').css('display', '');
				$('.btn-loading').css('display', 'none');
				$('#btn-submit-jabatan').css('display', '');
				LoadTableJabatan();
				Swal.fire({
					icon: 'success',
					title: 'Sukses',
					text: 'Berhasil Menambahkan Jabatan',
					timer: 1200,
					showConfirmButton: false
				});
			},
			error: function(err) {
				console.log(err);
			}
		});
	});

	//DELETE JABATAN
	$('body').on('click', '.btn-delete-jabatan', function(e) {
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
					type: 'get',
					url: '/admin/delete-jabatan/' + id,
					success: function(response) {
						Swal.fire('Deleted!', nama + ' telah dihapus.', 'success');
						LoadTableJabatan();
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
	});

	$('body').on('click', '.btn-edit-jabatan', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		var nama = $(this).attr('data-nama');
		$('#EditJabatanModal').modal('show');
		$('#btn-submit-jabatan').css('display', 'none');
		$('#btn-save-jabatan').css('display', '');
        $('#kolom-jabatan').val(nama);
        $("#id-jabatan").val(id)

	});

    $('body').on('submit', '#form-edit-jabatan', function(e) {
        e.preventDefault();
        $('.btn-close-edit').css('display', 'none');
        $('.btn-loading-edit').css('display', '');
        $('#btn-save-jabatan').css('display', 'none');
        var data = $('#form-edit-jabatan').serialize();
        var id = $("#id-jabatan").val();
        $.ajax({
            type: 'post',
            url: '/admin/edit-jabatan/' + id,
            data: data,
            success: function(response) {
                $('#EditJabatanModal').modal('hide');
                $('#form-edit-jabatan').trigger('reset');
                $('.btn-close-edit').css('display', '');
                $('.btn-loading-edit').css('display', 'none');
                $('#btn-save-jabatan').css('display', '');
                LoadTableJabatan();
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Berhasil Mengedit Jabatan',
                    timer: 1200,
                    showConfirmButton: false
                });
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
	//------------------------------------------END FITUR JABATAN-----------------------------------------

	LoadTableSemester();

	function LoadTableSemester() {
		$('#datatable-semester').load('/load/table-semester', function() {
			$('#tbl-semester').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-semester',
					type: 'get'
				},
				columns: [
					{
						data: 'DT_RowIndex',
						name: 'DT_RowIndex',
						searchable: false
					},
					{
						data: 'semester',
						name: 'semester'
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

	//TAMBAH SMT
	$('body').on('submit', '#form-tambah-semester', function(e) {
		e.preventDefault();
		$('.btn-close').css('display', 'none');
		$('.btn-loading').css('display', '');
		$('#btn-submit-semester').css('display', 'none');
		var name = $('input[name=semester-tambah]').val();
		var toggle = $('input[name=status-tambah]').val();
		var token = $('input[name=token]').val();
		let status = 'ada';
		if (toggle == 'on') {
			status = 'aktif';
		} else {
			status = 'nonaktif';
		}
		$.ajax({
			type: 'post',
			url: '/admin/tambah-semester',
			data: { _token: token, semester: name, status: status },
			success: function(response) {
				$('.modal-title-semester').html();
				$('#TambahSemesterModal').modal('hide');
				$('#form-tambah-semester').trigger('reset');
				$('.btn-close').css('display', '');
				$('.btn-loading').css('display', 'none');
				$('#btn-submit-semester').css('display', '');
				LoadTableSemester();
				Swal.fire({
					icon: 'success',
					title: 'Sukses',
					text: 'Berhasil Menambahkan Semester',
					timer: 1200,
					showConfirmButton: false
				});
			},
			error: function(err) {
				console.log(err);
			}
		});
	});

	$('body').on('click', '.btn-delete-semester', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		var semester = $(this).attr('data-semester');
		Swal.fire({
			title: 'Hapus ' + semester + '?',
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
					url: '/admin/delete-semester/' + id,
					success: function(response) {
						Swal.fire('Deleted!', semester + ' telah dihapus.', 'success');
						LoadTableSemester();
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
	});

	$('body').on('click', '.btn-edit-semester', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		var semester = $(this).attr('data-semester');
		var status = $(this).attr('data-status');
		$('#editSemesterModal').modal('show');
		$('#btn-submit-semester').css('display', 'none');
		$('#btn-save-semester').css('display', '');
		$('#semester-edit').val(semester);
		if (status == 'aktif') {
			$('#status-edit').bootstrapToggle('on');
		} else {
			$('#status-edit').bootstrapToggle('off');
		}

		$('body').on('submit', '#form-edit-semester', function(e) {
			e.preventDefault();
			$('.btn-close-edit').css('display', 'none');
			$('.btn-loading-edit').css('display', '');
			$('#btn-save-semester').css('display', 'none');
			var name = $('input[name=semester-edit]').val();
			var toggle = $('input[name=status-edit]').val();
			var token = $('input[name=token-edit]').val();
			let status = 'ada';
			if (toggle == 'on') {
				status = 'aktif';
			} else {
				status = 'nonaktif';
			}
			$.ajax({
				type: 'post',
				url: '/admin/edit-semester/' + id,
				data: { _token: token, semester: name, status: status },
				success: function(response) {
					$('#editSemesterModal').modal('hide');
					$('#form-edit-semester').trigger('reset');
					$('.btn-close-edit').css('display', '');
					$('.btn-loading-edit').css('display', 'none');
					$('#btn-save-semester').css('display', '');
					LoadTableSemester();
					Swal.fire({
						icon: 'success',
						title: 'Sukses',
						text: 'Berhasil Mengedit Semester',
						timer: 1200,
						showConfirmButton: false
					});
				},
				error: function(err) {
					console.log(err);
				}
			});
		});
	});

	LoadTableBK();

	function LoadTableBK() {
		$('#datatable-bk').load('/load/table-bk', function() {
			$('#tbl-bk').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-bk',
					type: 'get'
				},
				columns: [
					{
						data: 'DT_RowIndex',
						name: 'DT_RowIndex',
						searchable: false
					},
					{
						data: 'nama_bk',
						name: 'nama_bk'
					},
					{
						data: 'akreditasi',
						name: 'akreditasi'
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
	//TAMBAH SMT
	$('body').on('submit', '#form-tambah-bk', function(e) {
		e.preventDefault();
		$('.btn-close').css('display', 'none');
		$('.btn-loading').css('display', '');
		$('#btn-submit-bk').css('display', 'none');

		var formData = new FormData();
		var name = $('input[name=nama-tambah]').val();
		var deskripsi = tinymce.get('deskripsi-tambah').getContent();
		var token = $('input[name=token]').val();
		var akreditasi = $('#AkreditasiTambah option:selected').text();
		formData.append('_token', token);
		formData.append('nama', name);
		formData.append('deskripsi', deskripsi);
		formData.append('akreditasi', akreditasi);
		formData.append('gambar', $('input[type=file]')[0].files[0]);
		$.ajax({
			type: 'post',
			url: '/admin/tambah-bk',
			data: formData,
			processData: false,
			contentType: false,
			success: function(response) {
				$('.modal-title-semester').html();
				$('#BKModal').modal('hide');
				$('#form-tambah-bk').trigger('reset');
				$('.btn-close').css('display', '');
				$('.btn-loading').css('display', 'none');
				$('#btn-submit-bk').css('display', '');
				LoadTableBK();
				Swal.fire({
					icon: 'success',
					title: 'Sukses',
					text: 'Berhasil Menambahkan Bidang Keahlian',
					timer: 1200,
					showConfirmButton: false
				});
			},
			error: function(err) {
				console.log(err);
			}
		});
	});

	$('body').on('click', '.btn-delete-bk', function(e) {
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
					type: 'get',
					url: '/admin/delete-bk/' + id,
					success: function(response) {
						Swal.fire('Deleted!', nama + ' telah dihapus.', 'success');
						LoadTableBK();
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
	});

	$('body').on('click', '.btn-edit-bk', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		$.ajax({
			url: '/admin/edit-bk/' + id,
			type: 'GET',
			success: function(res) {
				$('#editBKModal').modal({ backdrop: 'static', keyboard: false });
				$('#editBKModal').modal('show');
				$('#btn-save-bk').css('display', '');
				$('input[name=edit-id]').val(id);
				$('#nama-edit').val(res.values.nama_bk);
				$('#AkreditasiEdit').val(res.values.akreditasi);
				tinymce.get('deskripsi-edit').setContent(res.values.deskripsi);
			}
		});
		return false;
	});
	$('body').on('submit', '#form-edit-bk', function(e) {
		e.preventDefault();
		$('.btn-close-edit').css('display', 'none');
		$('.btn-loading-edit').css('display', '');
		$('#btn-save-bk').css('display', 'none');
		var formData = new FormData();
		var name = $('input[name=nama-edit]').val();
		var deskripsi = tinymce.get('deskripsi-edit').getContent();
		var token = $('input[name=token]').val();
		var id = $('input[name=edit-id]').val();
		var akreditasi = $('#AkreditasiEdit option:selected').text();
		formData.append('_token', token);
		formData.append('nama', name);
		formData.append('deskripsi', deskripsi);
		formData.append('akreditasi', akreditasi);
		formData.append('gambar', $('input[type=file]')[1].files[0]);
		$.ajax({
			type: 'post',
			url: '/admin/konfirmasi-edit-bk/' + id,
			data: formData,
			processData: false,
			contentType: false,
			success: function(response) {
				$('#editBKModal').modal('hide');
				$('#form-edit-bk').trigger('reset');
				$('.btn-close-edit').css('display', '');
				$('.btn-loading-edit').css('display', 'none');
				$('#btn-save-bk').css('display', '');
				LoadTableBK();
				Swal.fire({
					icon: 'success',
					title: 'Sukses',
					text: 'Berhasil Mengedit Bidang Keahlian',
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

	//---------FITUR PENGATURAN PROFILE  ----
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	//update profile
	$('body').on('click', '#btn-edit-profile', function(e) {
		e.preventDefault();
		var formData = new FormData();
		var name = $('input[name=name]').val();
		var email = $('input[name=email]').val();
		var files = $('#file-upload')[0].files[0];
		var id = $(this).data('id');

		formData.append('gambar', files);
		formData.append('nama', name);
		formData.append('email', email);

		$.ajax({
			type: 'POST',
			url: 'editprofile/' + id,
			data: formData,
			contentType: false,
			processData: false,
			success: function(data) {
				if (data.status == '1') {
					Swal.fire({
						icon: 'success',
						title: 'Sukses',
						text: 'Sukses edit profile',
						timer: 1000,
						showConfirmButton: false
					});
					location.reload();
				} else if (data.status == '0') {
					Swal.fire({
						icon: 'error',
						title: 'Ooopss...',
						text: 'Gagal edit profile',
						timer: 1000,
						showConfirmButton: false
					});
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Ooopss...',
						text: 'Email sudah ada!',
						timer: 1200,
						showConfirmButton: false
					});
				}
			}
		});
	});

	//ganti password
	$('body').on('click', '#btn-edit-password', function(e) {
		e.preventDefault();
		var password = $('#password').val();
		var password_confirm = $('#password-confirm').val();
		var password_lama = $('#password-lama').val();
		var id = $(this).data('id');
		if (password == '' || password_confirm == '') {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Password tidak boleh kosong!',
				timer: 1000,
				showConfirmButton: false
			});
		} else {
			$.ajax({
				type: 'POST',
				url: 'editpassword/' + id,
				data: {
					password: password,
					password_confirmation: password_confirm,
					id: id,
					password_lama: password_lama
				},
				dataType: 'json',
				success: function(data) {
					if (data.status == '1') {
						$('.form-edit-password')[0].reset();
						Swal.fire({
							icon: 'success',
							title: 'Sukses',
							text: 'Sukses ganti password',
							timer: 1000,
							showConfirmButton: false
						});
					} else if (data.status == '0') {
						$('.form-edit-password')[0].reset();
						Swal.fire({
							icon: 'error',
							title: 'Ooopss...',
							text: 'Gagal ganti password',
							timer: 1000,
							showConfirmButton: false
						});
					} else if (data.status == 'salah') {
						$('.form-edit-password')[0].reset();
						Swal.fire({
							icon: 'error',
							title: 'Ooopss...',
							text: 'Password anda salah!',
							timer: 1000,
							showConfirmButton: false
						});
					} else {
						$('.form-edit-password')[0].reset();
						Swal.fire({
							icon: 'error',
							title: 'Ooopss...',
							text: 'Password harus sama!',
							timer: 1200,
							showConfirmButton: false
						});
					}
				}
			});
		}
	});
	//--END PENGATURAN PROFILE ----
	$.getScript('/js/Home/headline.js');
	$.getScript('/js/Home/kerjasama.js');
	$.getScript('/js/Home/konten.js');
});
