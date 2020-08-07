$(document).ready(function() {

    //DATATABLE BLOG
	LoadTableWeblink();
	function LoadTableWeblink() {
		$('#datatable-weblink').load('/load/table-blog', function() {
			$('#table-weblink').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-blog',
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

    //OPEN MODAL TAMBAH BLOG
    $("#btn-modal-blog").on("click",function(e){
        e.preventDefault()
        $(".btn-close").css("display","")
        $(".btn-submit-blog").css("display","")
        $(".btn-loading").css("display","none")
        $("#BlogModal").modal("show")
    })

    //SUBMIT BLOG
    $("body").on("submit","#FormAddBlog", function(e){
        e.preventDefault()
        $(".btn-submit-blog").css("display","none")
        $(".btn-loading").css("display","")
        $(".btn-close").css("display","none")
        var data = $("#FormAddBlog").serialize()
        $.ajax({
            type: "post",
            url: "/tambah/blog",
            data: data,
            success: function(response){
                $("#table-weblink").DataTable().page('last').draw('page');
                $("#BlogModal").modal("hide")
                $("#FormAddBlog").trigger("reset")
                $(".btn-submit-blog").css("display","")
                $(".btn-loading").css("display","none")
                $(".btn-close").css("display","")
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Berhasil Menambahkan Blog',
                    timer: 1200,
                    showConfirmButton: false
                });
            },
            error: function(err){
                console.log(err)
            }
        })

    })

    //DELETE BLOG
    $("body").on("click",".btn-delete-blog", function(e){
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
					url: '/admin/delete-blog/' + id,
					success: function(response) {
						Swal.fire('Deleted!', nama + ' telah dihapus.', 'success');
						$("#table-weblink").DataTable().page('last').draw('page');
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
    })

    //OPEN MODAL EDIT BLOG
    $("body").on("click",".btn-edit-blog",function(e){
        e.preventDefault()
        $(".btn-close").css("display","")
        $(".btn-save-blog").css("display","")
        $(".btn-loading").css("display","none")
        $("#editBlogModal").modal("show")
        var id = $(this).attr("data-id")
        var nama = $(this).attr("data-nama")
        var link = $(this).attr("data-link")

        $("#id-blog").val(id)
        $("#edit_nama_web").val(nama)
        $("#edit_link_web").val(link)
    })

    //SAVE EDIT BLOG
    $("body").on("submit","#FormEditBlog", function(e){
        e.preventDefault()
        var id = $("#id-blog").val()
        var data = $("#FormEditBlog").serialize()

        $(".btn-close").css("display","none")
        $(".btn-save-blog").css("display","none")
        $(".btn-loading").css("display","")
        $.ajax({
            type: "post",
            url: "admin/edit-blog/"+id,
            data: data,
            success: function(response){
                $("#table-weblink").DataTable().page('last').draw('page');
                $(".btn-close").css("display","")
                $(".btn-save-blog").css("display","none")
                $(".btn-loading").css("display","")
                $("#FormEditBlog").trigger("reset")
                $("#editBlogModal").modal("hide")
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Berhasil Memperbarui Blog',
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
