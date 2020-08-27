$(document).ready(function() {
    //DATATABLE TA
	LoadTableKA();
	function LoadTableKA() {
		$('#datatable-ka').load('/load/table-kegiatan-akademik', function() {
			$('#table-kegiatan-akademik').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-kegiatan-akademik',
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
    $('body').on("submit","#FormAddKA", function(e){
        e.preventDefault()

        var deskripsi = $("#deskripsi").val()
        if(deskripsi.length != 0){
            var data = $("#FormAddKA").serialize()
            $(".btn-loading").css("display","")
            $(".btn-close").css("display","none")
            $(".btn-submit-ka").css("display","none")

            $.ajax({
                type: "post",
                url: "/store-ka",
                data: data,
                success: function(response){
                    $(".btn-loading").css("display","none")
                    $(".btn-close").css("display","")
                    $(".btn-submit-ka").css("display","")
                    $("#FormAddKA").trigger("reset")
                    $("#KegiatanakaModal").modal("hide")
                    $("#table-kegiatan-akademik").DataTable().page('last').draw('page');
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
    $("body").on("click",".btn-delete-ka", function(e){
        e.preventDefault()
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
					url: '/delete-ka/' + id,
					success: function(response) {
						Swal.fire('Deleted!', nama + ' telah dihapus.', 'success');
						$("#table-kegiatan-akademik").DataTable().page('last').draw('page');
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
    })

    //OPEN MODAL EDIT
    $("body").on("click",".btn-edit-ka", function(){
        $("#editKegiatanakaModal").modal("show")
        var id = $(this).attr("data-id")

        $("#ka-id").val(id)

        $.ajax({
            type: "get",
            url: "/get-ka/"+id,
            success: function(response){
                $("#edit_judul").val(response.data.judul)
                tinymce.get('edit_deskripsi').setContent(response.data.deskripsi);
            },
            error: function(err){
                console.log(err)
            }
        })
    })

    //SAVE EDIT TA
    $('body').on('submit','#FormEditKA', function(e){
        e.preventDefault()
        var id = $("#ka-id").val()
        console.log(id)
        // console.log("dwadwaddwaw")
        var edit_deskripsi = $("#edit_deskripsi").val()
        if(edit_deskripsi.length != 0){

            var data = $("#FormEditKA").serialize()
            $(".btn-loading").css("display","")
            $(".btn-close").css("display","none")
            $(".btn-save-ka").css("display","none")

            $.ajax({
                type: "post",
                url: "/update-ka/"+id,
                data: data,
                success: function(response){
                    $(".btn-loading").css("display","none")
                    $(".btn-close").css("display","")
                    $(".btn-save-ka").css("display","")
                    $("#FormEditKA").trigger("reset")
                    $("#editKegiatanakaModal").modal("hide")
                    $("#table-kegiatan-akademik").DataTable().page('last').draw('page');
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Berhasil Mengedit Tugas Akhir',
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

    //SHOW
    $("body").on("click", ".btn-show-ka", function(e){
        e.preventDefault()
        var id = $(this).attr("data-id")
        $("#showKaModal").modal("show")

        $.ajax({
            type: "get",
            url: "/get-ka/"+id,
            success: function(response){
                $("#show_judul").val(response.data.judul)
                tinymce.get('show_deskripsi').setContent(response.data.deskripsi);
                tinymce.get('show_deskripsi').setMode('readonly');
            },
            error: function(err){
                console.log(err)
            }
        })
    })
})
