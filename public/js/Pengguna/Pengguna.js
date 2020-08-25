$(document).ready(function() {

    //DATATABLE
	LoadPengguna();
	function LoadPengguna() {
		$('#datatable-pengguna').load('/load/table-pengguna', function() {
			$('#tbl-pengguna').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-pengguna',
					type: 'get'
				},
				columns: [
					{
						data: 'DT_RowIndex',
						name: 'DT_RowIndex',
						searchable: false
					},
					{
						data: 'name',
						name: 'name'
                    },
					{
						data: 'email',
						name: 'email'
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

    //SUBMIT PENGGUNA
    $("body").on("submit","#FormPengguna", function(e){
        e.preventDefault()
        $(".btn-close").css("display","none")
        $(".btn-loading").css("display","")
        $(".btn-submit-pengguna").css("display","none")
        var data = $("#FormPengguna").serialize()

        $.ajax({
            type: "post",
            url: "/tambah-pengguna",
            data: data,
            success: function(response){
                $(".btn-close").css("display","")
                $(".btn-loading").css("display","none")
                $(".btn-submit-pengguna").css("display","")
                $("#PenggunaModal").modal("hide")
                $("#FormPengguna").trigger("reset")
                LoadPengguna()
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Berhasil Menambahkan Pengguna',
                    timer: 1200,
                    showConfirmButton: false
                });
            },
            error: function(err){
                console.log(err)
            }
        })
    })

    //HAPUS PENGGUNA
    $("body").on("click",".btn-delete-pengguna",function(e){
        e.preventDefault()
        var id = $(this).attr("data-id")
        var nama = $(this).attr("data-nama")

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
					url: "/hapus-pengguna/"+id,
					success: function(response) {
						Swal.fire('Deleted!', nama + ' telah dihapus.', 'success');
						$("#tbl-pengguna").DataTable().page('last').draw('page');
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
    })

})
