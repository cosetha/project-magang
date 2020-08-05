$(document).ready(function() {

    //DATATABLE
	LoadTableWeblink();
	function LoadTableWeblink() {
		$('#datatable-sosmed').load('/load/table-sosmed', function() {
			$('#table-sosmed').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-sosmed',
					type: 'get'
				},
				columns: [
					{
						data: 'DT_RowIndex',
						name: 'DT_RowIndex',
						searchable: false
					},
					{
						data: 'nama_web',
						name: 'nama_web'
					},
					{
						data: 'link',
						name: 'link'
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

    //OPEN MODAL TAMBAH SOSMED
    $("#btn-modal-sosmed").on("click",function(e){
        e.preventDefault()
        $(".btn-close").css("display","")
        $(".btn-submit-sosmed").css("display","")
        $(".btn-loading").css("display","none")
        $("#SosmedModal").modal("show")
    })

    //SUBMIT SOSMED
    $("body").on("submit","#FormAddSosmed", function(e){
        e.preventDefault()
        $(".btn-submit-sosmed").css("display","none")
        $(".btn-loading").css("display","")
        $(".btn-close").css("display","none")
        var data = $("#FormAddSosmed").serialize()
        $.ajax({
            type: "post",
            url: "/tambah/sosmed",
            data: data,
            success: function(response){
                $("#table-sosmed").DataTable().page('last').draw('page');
                $("#SosmedModal").modal("hide")
                $("#FormAddSosmed").trigger("reset")
                $(".btn-submit-sosmed").css("display","")
                $(".btn-loading").css("display","none")
                $(".btn-close").css("display","")
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Berhasil Menambahkan Sosmed',
                    timer: 1200,
                    showConfirmButton: false
                });
            },
            error: function(err){
                console.log(err)
            }
        })

    })

    //DELETE SOSMED
    $("body").on("click",".btn-delete-weblink", function(e){
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
					url: '/admin/delete-sosmed/' + id,
					success: function(response) {
						Swal.fire('Deleted!', nama + ' telah dihapus.', 'success');
						$("#table-sosmed").DataTable().page('last').draw('page');
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
    })

    //OPEN MODAL EDIT SOMED
    $("body").on("click",".btn-edit-weblink",function(e){
        e.preventDefault()
        $(".btn-close").css("display","")
        $(".btn-save-sosmed").css("display","")
        $(".btn-loading").css("display","none")
        $("#editSosmedModal").modal("show")
        var id = $(this).attr("data-id")
        var nama = $(this).attr("data-nama")
        var link = $(this).attr("data-link")
        var jenis = $(this).attr("data-menu")

        $("#id-sosmed").val(id)
        $("#edit_nama_web").val(nama)
        $("#edit_link_web").val(link)
        $("#edit_jenis").val(jenis)
    })

    //SAVE EDIT SOSMED
    $("body").on("submit","#FormEditSosmed", function(e){
        e.preventDefault()
        var id = $("#id-sosmed").val()
        var data = $("#FormEditSosmed").serialize()

        $(".btn-close").css("display","none")
        $(".btn-save-sosmed").css("display","none")
        $(".btn-loading").css("display","")
        $.ajax({
            type: "post",
            url: "admin/edit-sosmed/"+id,
            data: data,
            success: function(response){
                $("#table-sosmed").DataTable().page('last').draw('page');
                $(".btn-close").css("display","")
                $(".btn-save-sosmed").css("display","none")
                $(".btn-loading").css("display","")
                $("#FormEditSosmed").trigger("reset")
                $("#editSosmedModal").modal("hide")
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Berhasil Memperbarui Sosmed',
                    timer: 1200,
                    showConfirmButton: false
                });
            },
            error: function(err){
                console.log(err)
            }
        })
    })
})
