$(document).ready(function() {
    //DATATABLE TA
	LoadTableTA();
	function LoadTableTA() {
        AlertCount();
		$('#datatable-ta').load('/load/table-tugas-akhir', function() {
			$('#table-tugas-akhir').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-tugas-akhir',
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
						data: 'aksi',
						name: 'aksi',
						searchable: false,
						orderable: false
					}
				]
			});
		});
    }

    //SUBMIT TA
    $('body').on("submit","#FormTambahTA", function(e){
        e.preventDefault();

        var deskripsi = $("#deskripsi").val();
        if(deskripsi.length != 0){
            var data = $("#FormTambahTA").serialize();
            $(".btn-loading").css("display","");
            $(".btn-close").css("display","none");
            $(".btn-submit-to").css("display","none");

            $.ajax({
                type: "post",
                url: "/store-ta",
                data: data,
                success: function(response){
                    $(".btn-loading").css("display","none");
                    $(".btn-close").css("display","");
                    $(".btn-submit-to").css("display","");
                    $("#FormTambahTA").trigger("reset");
                    $("#TaModal").modal("hide");
                    LoadTableTA();
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Berhasil Menambahkan Tugas Akhir',
                        timer: 1200,
                        showConfirmButton: false
                    });
                },
                error: function(err){
                    console.log(err)
                }
            })
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'Deskripsi tidak boleh kosong',
            });
        }
    })

    //DELETE
    $("body").on("click",".btn-delete-ta", function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
		var nama = $(this).attr('data-judul');
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
					url: '/delete-ta/' + id,
					success: function(response) {
						Swal.fire('Deleted!', nama + ' telah dihapus.', 'success');
						LoadTableTA();
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
    })

    //OPEN MODAL EDIT
    $("body").on("click",".btn-edit-ta", function(){
        $("#editTaModal").modal("show");
        var id = $(this).attr("data-id");
        $("#id-ta").val(id);

        $.ajax({
            type: "get",
            url: "/get-ta/"+id,
            success: function(response){
                $("#edit_judul").val(response.data.judul);
                tinymce.get('edit_deskripsi').setContent(response.data.deskripsi);
            },
            error: function(err){
                console.log(err);
            }
        })
    })

    //SAVE EDIT TA
    $('body').on('submit','#FormEditTA', function(e){
        e.preventDefault();
        var id = $("#id-ta").val();
        var edit_deskripsi = $("#edit_deskripsi").val();
        if(edit_deskripsi.length != 0){

            var data = $("#FormEditTA").serialize();
            $(".btn-loading").css("display","");
            $(".btn-close").css("display","none");
            $(".btn-save-ta").css("display","none");

            $.ajax({
                type: "post",
                url: "/update-ta/"+id,
                data: data,
                success: function(response){
                    $(".btn-loading").css("display","none");
                    $(".btn-close").css("display","");
                    $(".btn-save-ta").css("display","");
                    $("#FormEditTA").trigger("reset");
                    $("#editTaModal").modal("hide");
                    LoadTableTA();
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Berhasil Mengedit Tugas Akhir',
                        timer: 1200,
                        showConfirmButton: false
                    });
                },
                error: function(err){
                    console.log(err);
                }
            })

        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'Deskripsi tidak boleh kosong',
            });
        }
    })

    //SHOW
    $("body").on("click", ".btn-show-ta", function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        $("#showTaModal").modal("show");

        $.ajax({
            type: "get",
            url: "/get-ta/"+id,
            success: function(response){
                $("#show_judul").val(response.data.judul);
                tinymce.get('show_deskripsi').setContent(response.data.deskripsi);
                tinymce.get('show_deskripsi').setMode('readonly');
            },
            error: function(err){
                console.log(err);
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
