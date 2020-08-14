$(document).ready(function() {

    //DATATABLE
	LoadDosen();
	function LoadDosen() {
		$('#datatable-dosen').load('/load/table-dosen', function() {
			$('#tbl-dosen').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-dosen',
					type: 'get'
				},
				columns: [
					{
						data: 'DT_RowIndex',
						name: 'DT_RowIndex',
						searchable: false
					},
					{
						data: 'nama',
						name: 'nama'
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

        //TAMBAH DOSEN
        $("body").on("submit","#FormTambahDosen", function(e){
            e.preventDefault()
            var formData = new FormData();
            var nama = $('input[name=nama]').val();
            var deskripsi = tinymce.get('deskripsi').getContent();
            var token = $('input[name=token]').val();
            formData.append('_token', token);
            formData.append('nama', nama);
            formData.append('deskripsi', deskripsi);
            formData.append('gambar', $('input[type=file]')[0].files[0]);

            $(".btn-close").css('display','none')
            $(".btn-loading").css('display','')
            $(".btn-submit-dosen").css('display','none')


            $.ajax({
                type: "post",
                url: "/tambah-dosen",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    $(".btn-close").css('display','')
                    $(".btn-loading").css('display','none')
                    $(".btn-submit-dosen").css('display','')
                    $("#DosenModal").modal("hide")
                    $("#FormTambahDosen").trigger("reset")
                    $("#tbl-dosen").DataTable().page('last').draw('page');
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Berhasil Menambahkan Dosen',
                        timer: 1200,
                        showConfirmButton: false
                    });
                },
                error: function(err){
                    console.log(err)
                }
            })
        })
    }


    //OPEN MODAL EDIT
    $("body").on("click",".btn-edit-dosen", function(e){
        e.preventDefault()
        $("#editDosenModal").modal("show")

        var id = $(this).attr("data-id")

        $.ajax({
            type: "get",
            url: "/get-dosen/"+id,
            success: function(response){
                $("#id-dosen").val(response.data.id)
                $("#edit-nama-dosen").val(response.data.nama)
                tinymce.get('edit_deskripsi').setContent(response.data.deskripsi);
            },
            error: function(err){
                console.log(err)
            }
        })
    })

    //SAVE EDIT
    $("body").on("submit","#FormEditDosen", function(e){
        e.preventDefault()
        var formData = new FormData();
            var id = $("#id-dosen").val();
            var nama = $('input[name=edit_nama]').val();
            var deskripsi = tinymce.get('edit_deskripsi').getContent();
            var token = $('input[name=token]').val();
            formData.append('_token', token);
            formData.append('nama', nama);
            formData.append('deskripsi', deskripsi);
            formData.append('gambar', $('input[type=file]')[1].files[0]);

            $(".btn-close").css('display','none')
            $(".btn-loading").css('display','')
            $(".btn-save").css('display','none')

            $.ajax({
                type: "post",
                url: "/save-dosen/"+id,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    $(".btn-close").css('display','')
                    $(".btn-loading").css('display','none')
                    $(".btn-save").css('display','')
                    $("#editDosenModal").modal("hide")
                    $("#FormEditDosen").trigger("reset")
                    $("#tbl-dosen").DataTable().page('last').draw('page');
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Berhasil Edit Dosen',
                        timer: 1200,
                        showConfirmButton: false
                    });
                },
                error: function(err){
                    console.log(err)
                }
            })
    })

    //DELETE DOSEN
    $("body").on("click",".btn-delete-dosen", function(e){
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
					url: '/delete-dosen/' + id,
					success: function(response) {
						Swal.fire('Deleted!', nama + ' telah dihapus.', 'success');
						$("#tbl-dosen").DataTable().page('last').draw('page');
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
    })

    //SHOW
    $("body").on("click",'.btn-show-dosen',function(e){
        e.preventDefault()
        $("#ShowDosen").modal("show")
        tinymce.get('show-deskripsi').setMode('readonly');

        var id = $(this).attr("data-id")

        $.ajax({
            type: "get",
            url: "/get-dosen/"+id,
            success: function(response){
                $("#show-nama").val(response.data.nama)
                tinymce.get('show-deskripsi').setContent(response.data.deskripsi);
            },
            error: function(err){
                console.log(err)
            }
        })
    })

})
