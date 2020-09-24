$(document).ready(function() {
	LoadTableAkreditasi();
	// Show Akreditasi
	function LoadTableAkreditasi() {
		AlertCount();
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
						data: 'file',
						render: function(data, type, row) {
							return '<img  class = "rounded mx-auto d-block" height="200px" src="' + data + '" />';
						}
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

	//Tambah Akreditasi
	$('body').on('submit', '#form-akreditasi', function(e) {
		e.preventDefault();
		$('.btn-close').css('display', 'none');
		$('.btn-loading').css('display', '');
		$('#btn-submit-akreditasi').css('display', 'none');
		var formData = new FormData();
		var file = $('#file-upload')[0].files[0];
		var nilai = $('#nilai').val();
		var tanggal_mulai = $('input[name=tanggal_mulai]').val();
		var tanggal_selesai = $('input[name=tanggal_selesai]').val();
		formData.append('nilai', nilai);
		formData.append('tanggal_mulai', tanggal_mulai);
        formData.append('tanggal_selesai', tanggal_selesai);
        formData.append('file', file);

        console.log(tanggal_mulai)
        console.log(tanggal_selesai)

		if (nilai != '' && tanggal_mulai != '' && tanggal_selesai != '') {
			$.ajax({
				type: 'post',
				url: '/admin/tambah-akreditasi',
				data: formData,
				processData: false,
				contentType: false,
				accepts: 'application / json',
				success: function(response) {
					$('.btn-close').css('display', '');
					$('.btn-loading').css('display', 'none');
					$('#btn-submit-akreditasi').css('display', '');
					if (response.hasOwnProperty('error')) {
						Swal.fire({
							icon: 'error',
							title: 'Ooopss...',
							text: response.error,
							timer: 3000,
							showConfirmButton: false
						});
					} else {
                        $('#AkreditasiModal').modal('hide');
                        $('#form-akreditasi').trigger('reset');
                        LoadTableAkreditasi();
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

                if(res.values.status == "nonaktif"){
                    $(".btn-aktifkan-akreditasi").css("display","");
                    $(".btn-nonaktifkan-akreditasi").css("display","none");
                }else{
                    $(".btn-aktifkan-akreditasi").css("display","none");
                    $(".btn-nonaktifkan-akreditasi").css("display","");
                }

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

    //Nonaktifkan
    $("body").on("click",'.btn-nonaktifkan-akreditasi', function(e){
        e.preventDefault();
        $('.btn-close-edit').css('display', 'none');
		$('.btn-loading-edit').css('display', '');
        $('#btn-save-akreditasi').css('display', 'none');
        $(".btn-nonaktifkan-akreditasi").css("display","none");
        var id = $("#id-edit").val();

        $.ajax({
            type: "get",
            url: "/nonaktifkan-akreditasi/"+id,
            success: function(response){
                $('#editAkreditasiModal').modal('hide');
				$('#form-akreditasi-edit').trigger('reset');
                $('.btn-close-edit').css('display', '');
				$('.btn-loading-edit').css('display', 'none');
                $('#btn-save-akreditasi').css('display', '');
                $(".btn-nonaktifkan-akreditasi").css("display","");
                LoadTableAkreditasi();
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Akreditasi non-Aktif!',
                    timer: 1200,
                    showConfirmButton: false
                });
            },
            error: function(err){
                console.log(err);
            }
        })
    })

    //Aktifkan
    $("body").on("click",".btn-aktifkan-akreditasi", function(e){
        e.preventDefault();
        $('.btn-close-edit').css('display', 'none');
		$('.btn-loading-edit').css('display', '');
        $('#btn-save-akreditasi').css('display', 'none');
        $(".btn-aktifkan-akreditasi").css("display","none");
        var id = $("#id-edit").val();

        $.ajax({
            type: "get",
            url: "/aktifkan-akreditasi/"+id,
            success: function(response){
                $('#editAkreditasiModal').modal('hide');
				$('#form-akreditasi-edit').trigger('reset');
                $('.btn-close-edit').css('display', '');
				$('.btn-loading-edit').css('display', 'none');
                $('#btn-save-akreditasi').css('display', '');
                $(".btn-aktifkan-akreditasi").css("display","");
                LoadTableAkreditasi();
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Akreditasi Aktif!',
                    timer: 1200,
                    showConfirmButton: false
                });
            },
            error: function(err){
                console.log(err);
            }
        })
    })

	// Update Akreditasi
	$('body').on('submit', '#form-akreditasi-edit', function(e) {
		e.preventDefault();
		$('.btn-close-edit').css('display', 'none');
		$('.btn-loading-edit').css('display', '');
		$('#btn-save-akreditasi').css('display', 'none');
		var formData = new FormData();
		var file = $('#file-upload-edit')[0].files[0];
		var nilai = $('#nilai-edit').val();
		var tanggal_mulai = $('input[name=tanggal_mulai-edit]').val();
		var tanggal_selesai = $('input[name=tanggal_selesai-edit]').val();

		var id = $('input[name=id-edit]').val();
		formData.append('nilai', nilai);
		formData.append('tanggal_mulai', tanggal_mulai);
        formData.append('tanggal_selesai', tanggal_selesai);
        formData.append('file', file);

		if (nilai != '' && tanggal_mulai != '' && tanggal_selesai != '') {
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
		var id = $(this).attr("data-id");
		Swal.fire({
			title: 'Hapus ?',
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
					url: '/delete-akreditasi/' + id,
					success: function(response) {

							Swal.fire({
								icon: 'success',
								title: response.message,
								text: 'Berhasil Menghapus Akreditasi',
								timer: 2000,
								showConfirmButton: false
							});

						LoadTableAkreditasi();
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
