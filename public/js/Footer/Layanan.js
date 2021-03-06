$(document).ready(function() {

    //DATATABLE LAYANAN
	LoadTableWeblink();
	function LoadTableWeblink() {
        AlertCount();
		$('#datatable-weblink').load('/load/table-layanan', function() {
			$('#table-weblink').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-layanan',
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
                        },
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

    //OPEN MODAL TAMBAH LAYANAN
    $("#btn-modal-layanan").on("click",function(e){
        e.preventDefault();
        $(".btn-close").css("display","");
        $(".btn-submit-layanan").css("display","");
        $(".btn-loading").css("display","none");
        $("#LayananModal").modal("show");
    })

    //SUBMIT LAYANAN
    $("body").on("submit","#FormAddLayanan", function(e){
        e.preventDefault();
        $(".btn-submit-layanan").css("display","none");
        $(".btn-loading").css("display","");
        $(".btn-close").css("display","none");
        var data = $("#FormAddLayanan").serialize();
        var nama = $("#nama_web").val();
        var link = $("#link_Web").val();

        if(nama != '' && link != ''){

            $.ajax({
                type: "post",
                url: "/tambah/layanan",
                data: data,
                success: function(response){
                    LoadTableWeblink();
                    $("#LayananModal").modal("hide");
                    $("#FormAddLayanan").trigger("reset");
                    $(".btn-submit-layanan").css("display","");
                    $(".btn-loading").css("display","none");
                    $(".btn-close").css("display","");
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Berhasil Menambahkan Layanan',
                        timer: 1200,
                        showConfirmButton: false
                    });
                },
                error: function(err){
                    console.log(err);
                }
            })

        }else{
            $(".btn-submit-layanan").css("display","");
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

    //DELETE LAYANAN
    $("body").on("click",".btn-delete-layanan", function(e){
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
					url: '/admin/delete-layanan/' + id,
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

    //OPEN MODAL EDIT LAYANAN
    $("body").on("click",".btn-edit-layanan",function(e){
        e.preventDefault();
        $(".btn-close").css("display","");
        $(".btn-save-layanan").css("display","");
        $(".btn-loading").css("display","none");
        $("#editLayananModal").modal("show");
        var id = $(this).attr("data-id");
        var nama = $(this).attr("data-nama");
        var link = $(this).attr("data-link");

        $("#id-layanan").val(id);
        $("#edit_nama_web").val(nama);
        $("#edit_link_web").val(link);
    })

    //SAVE EDIT LAYANAN
    $("body").on("submit","#FormEditLayanan", function(e){
        e.preventDefault();
        var id = $("#id-layanan").val();
        var data = $("#FormEditLayanan").serialize();
        var nama = $("#edit_nama_web").val();
        var link = $("#edit_link_web").val();

        $(".btn-close").css("display","none");
        $(".btn-save-layanan").css("display","none");
        $(".btn-loading").css("display","");

        if(nama != '' && link != ''){
            $.ajax({
                type: "post",
                url: "admin/edit-layanan/"+id,
                data: data,
                success: function(response){
                    LoadTableWeblink();
                    $(".btn-close").css("display","");
                    $(".btn-save-layanan").css("display","");
                    $(".btn-loading").css("display","none");
                    $("#FormEditLayanan").trigger("reset");
                    $("#editLayananModal").modal("hide");
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Berhasil Memperbarui Layanan',
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
            $(".btn-save-layanan").css("display","");
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
