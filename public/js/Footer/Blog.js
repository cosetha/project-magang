$(document).ready(function() {

    //DATATABLE BLOG
	LoadTableWeblink();
	function LoadTableWeblink() {
        AlertCount();
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
						name: 'link',
                        "render": function(data, type, full, meta) {
                            return '<a href="'+data+'" target="_blank">'+data+'</a>';
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

    //OPEN MODAL TAMBAH BLOG
    $("#btn-modal-blog").on("click",function(e){
        e.preventDefault();
        $(".btn-close").css("display","");
        $(".btn-submit-blog").css("display","");
        $(".btn-loading").css("display","none");
        $("#BlogModal").modal("show");
    })

    //SUBMIT BLOG
    $("body").on("submit","#FormAddBlog", function(e){
        e.preventDefault();
        $(".btn-submit-blog").css("display","none");
        $(".btn-loading").css("display","");
        $(".btn-close").css("display","none");
        var data = $("#FormAddBlog").serialize();
        var nama = $("#nama_web").val();
        var link = $("#link_Web").val();

        if(nama != '' && link != ''){
            $.ajax({
                type: "post",
                url: "/tambah/blog",
                data: data,
                success: function(response){
                    LoadTableWeblink();
                    $("#BlogModal").modal("hide");
                    $("#FormAddBlog").trigger("reset");
                    $(".btn-submit-blog").css("display","");
                    $(".btn-loading").css("display","none");
                    $(".btn-close").css("display","");
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Berhasil Menambahkan Blog',
                        timer: 1200,
                        showConfirmButton: false
                    });
                },
                error: function(err){
                    console.log(err);
                }
            })
        }else{
            $(".btn-submit-blog").css("display","");
            $(".btn-loading").css("display","none");
            $(".btn-close").css("display","");
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Form tidak boleh kosong!',
                timer: 1200,
                showConfirmButton: false
            });
        }

    })

    //DELETE BLOG
    $("body").on("click",".btn-delete-blog", function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        var nama = $(this).attr("data-nama");

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
						LoadTableWeblink();
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
        e.preventDefault();
        $(".btn-close").css("display","");
        $(".btn-save-blog").css("display","");
        $(".btn-loading").css("display","none");
        $("#editBlogModal").modal("show");
        var id = $(this).attr("data-id");
        var nama = $(this).attr("data-nama");
        var link = $(this).attr("data-link");

        $("#id-blog").val(id);
        $("#edit_nama_web").val(nama);
        $("#edit_link_web").val(link);
    })

    //SAVE EDIT BLOG
    $("body").on("submit","#FormEditBlog", function(e){
        e.preventDefault();
        var id = $("#id-blog").val();
        var data = $("#FormEditBlog").serialize();
        var nama = $("#edit_nama_web").val();
        var link = $("#edit_link_web").val();

        $(".btn-close").css("display","none");
        $(".btn-save-blog").css("display","none");
        $(".btn-loading").css("display","");

        if(nama != '' && link != ''){
            $.ajax({
                type: "post",
                url: "admin/edit-blog/"+id,
                data: data,
                success: function(response){
                    LoadTableWeblink();
                    $(".btn-close").css("display","");
                    $(".btn-save-blog").css("display","");
                    $(".btn-loading").css("display","none");
                    $("#FormEditBlog").trigger("reset");
                    $("#editBlogModal").modal("hide");
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
        }else{
            $(".btn-close").css("display","");
            $(".btn-save-blog").css("display","");
            $(".btn-loading").css("display","none");
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Form tidak boleh kosong!',
                timer: 1200,
                showConfirmButton: false
            });
        }

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
