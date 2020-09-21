$(document).ready(function() {

    //DATATABLE QUICK MENU
	LoadTableWeblink();
	function LoadTableWeblink() {
        AlertCount();
		$('#datatable-weblink').load('/load/table-quick-menu', function() {
			$('#table-weblink').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-quick-menu',
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

    //OPEN MODAL TAMBAH QUICK MENU
    $("#btn-modal-quick-menu").on("click",function(e){
        e.preventDefault()
        $(".btn-close").css("display","")
        $(".btn-submit-quick-menu").css("display","")
        $(".btn-loading").css("display","none")
        $("#QuickMenuModal").modal("show")
    })

    //SUBMIT QUICK MENU
    $("body").on("submit","#FormAddQuickMenu", function(e){
        e.preventDefault()
        $(".btn-submit-quick-menu").css("display","none")
        $(".btn-loading").css("display","")
        $(".btn-close").css("display","none")
        var data = $("#FormAddQuickMenu").serialize()
        var nama = $("#nama_web").val()
        var link = $("#link_Web").val()

        if(nama != '' && link != ''){
            $.ajax({
                type: "post",
                url: "/tambah/quick-menu",
                data: data,
                success: function(response){
                    LoadTableWeblink();
                    $("#QuickMenuModal").modal("hide")
                    $("#FormAddQuickMenu").trigger("reset")
                    $(".btn-submit-quick-menu").css("display","")
                    $(".btn-loading").css("display","none")
                    $(".btn-close").css("display","")
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Berhasil Menambahkan Quick Menu',
                        timer: 1200,
                        showConfirmButton: false
                    });
                },
                error: function(err){
                    console.log(err)
                }
            })
        }else{
            $(".btn-submit-quick-menu").css("display","")
            $(".btn-loading").css("display","none")
            $(".btn-close").css("display","")
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Form tidak boleh kosong!',
                timer: 1200,
                showConfirmButton: false
            });
        }

    })

    //DELETE QUICK MENU
    $("body").on("click",".btn-delete-quick-menu", function(e){
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
					url: '/admin/delete-quick-menu/' + id,
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

    //OPEN MODAL EDIT SOMED
    $("body").on("click",".btn-edit-quick-menu",function(e){
        e.preventDefault()
        $(".btn-close").css("display","")
        $(".btn-save-quick-menu").css("display","")
        $(".btn-loading").css("display","none")
        $("#editQuickMenuModal").modal("show")
        var id = $(this).attr("data-id")
        var nama = $(this).attr("data-nama")
        var link = $(this).attr("data-link")

        $("#id-quick-menu").val(id)
        $("#edit_nama_web_q").val(nama)
        $("#edit_link_web_q").val(link)
    })

    //SAVE EDIT QUICK MENU
    $("body").on("submit","#FormEditQuickMenu", function(e){
        e.preventDefault()
        var id = $("#id-quick-menu").val()
        var data = $("#FormEditQuickMenu").serialize()
        var nama = $("#edit_nama_web_q").val()
        var link = $("#edit_link_web_q").val()

        console.log(nama)
        console.log(link)

        $(".btn-close").css("display","none")
        $(".btn-save-quick-menu").css("display","none")
        $(".btn-loading").css("display","")

        if(nama != '' && link != ''){
            console.log("masuk")
            $.ajax({
                type: "post",
                url: "admin/edit-quick-menu/"+id,
                data: data,
                success: function(response){
                    LoadTableWeblink();
                    $(".btn-close").css("display","")
                    $(".btn-save-quick-menu").css("display","")
                    $(".btn-loading").css("display","none")
                    $("#FormEditQuickMenu").trigger("reset")
                    $("#editQuickMenuModal").modal("hide")
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Berhasil Memperbarui Quick Menu',
                        timer: 1200,
                        showConfirmButton: false
                    });
                },
                error: function(err){
                    console.log(err)
                }
            })
        }else{
            $(".btn-close").css("display","")
            $(".btn-save-quick-menu").css("display","")
            $(".btn-loading").css("display","none")
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
