$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        loadDataBerita();
        //tampil Berita
        function loadDataBerita() {
            AlertCount();
            $('#datatable-berita').load('/berita/datatable', function() {
                var host = window.location.origin;
                $('#berita-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '/berita/data',
                        type: 'GET'
                    },
                    columns: [
                        {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
                        {data: 'judul',name: 'judul'},
                        {
                            data: 'gambar',
                            name: 'gambar',
                            "render": function(data, type, row) {
                                return '<img src=" ' + host + '/'+ data + ' " style="height:100px;width:100px;"/>';
                            },
                            searchable: false
                        },
                        {data: 'name',name: 'name'},
                        {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
                    ]
                });
            });
        }
        //tambah berita
        $('body').on('click', '#btn-tambah-berita', function(e) {
            e.preventDefault();
            var formData = new FormData();
            $(".btn-loading").css("display","");
            $(".btn-close").css("display","none");
            $("#btn-tambah-berita").css("display","none");

            var judul = $('input[name=judul]').val();
            var deskripsi = tinymce.get('deskripsi-berita').getContent();
            var penulis = $(this).data('penulis');
            var gambar = $('#file-upload')[0].files[0];

            formData.append('judul', judul);
            formData.append('deskripsi', deskripsi);
            formData.append('penulis', penulis);
            formData.append('gambar', gambar);

            if(judul == "" || deskripsi == "" || penulis == "" || gambar == "") {
                $(".btn-loading").css("display","none");
                $(".btn-close").css("display","");
                $("#btn-tambah-berita").css("display","");
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Data tidak boleh kosong!',
                    timer: 1200,
                    showConfirmButton: false
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: 'berita',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $(".btn-loading").css("display","none")
                            $(".btn-close").css("display","")
                            $("#btn-tambah-berita").css("display","")
                        if(data.status == "ok") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Berhasil Menambahkan Berita!',
                                timer: 1200,
                                showConfirmButton: false
                            });
                            $('#form-tambah-berita').trigger('reset');
                            $('#BeritaModal .close').click();
                            loadDataBerita();
                        } else if(data.status == "not_valid") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Silahkan unggah file gambar!',
                                timer: 1200,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Gagal Menambahkan Berita!',
                                timer: 1200,
                                showConfirmButton: false
                            });
                        }
                    },
                    error: function(err){
                        console.log(err);
                    }
                });
            }
        });
        //tampil edit
        $('body').on('click', '.btn-edit-berita', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var host = window.location.origin;
            $('input[name=edit-id]').val(id);
            $.ajax({
                type: 'GET',
                url: 'berita/edit/' + id,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#editBeritaModal').modal('show');
                    $('#image-edit-berita').attr('src', host + '/' + data.data.gambar);
                    $('#judul-berita-edit').val(data.data.judul);
                    tinymce.get('deskripsi-berita-edit').setContent(data.data.deskripsi);
                }
            });
        });
        //edit berita
        $('body').on('click', '#btn-edit-berita', function(e) {
            e.preventDefault();
            var formData = new FormData();

            $(".btn-loading").css("display","");
            $(".btn-close").css("display","none");
            $("#btn-edit-berita").css("display","none");

            var judul = $('input[name=judul-berita-edit]').val();
            var deskripsi = tinymce.get('deskripsi-berita-edit').getContent();
            var penulis = $(this).data('penulis');
            var gambar = $('#file-upload-edit')[0].files[0];
            var id = $('input[name=edit-id]').val();
            formData.append('judul', judul);
            formData.append('deskripsi', deskripsi);
            formData.append('penulis', penulis);
            formData.append('gambar', gambar);

            if(judul == "" || deskripsi == "" || penulis == "") {
                $(".btn-loading").css("display","none");
                $(".btn-close").css("display","");
                $("#btn-edit-berita").css("display","");
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Data tidak boleh kosong!',
                    timer: 1200,
                    showConfirmButton: false
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: 'berita/update/' + id,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $(".btn-loading").css("display","none");
                        $(".btn-close").css("display","");
                        $("#btn-edit-berita").css("display","");
                        if(data.status == "ok") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Berhasil Edit Berita!',
                                timer: 1200,
                                showConfirmButton: false
                            });
                            $('#form-edit-berita').trigger('reset');
                            $('#editBeritaModal .close').click();
                            loadDataBerita();
                        } else if(data.status == "not_valid") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Silahkan unggah file gambar!',
                                timer: 1200,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Gagal Edit Berita!',
                                timer: 1200,
                                showConfirmButton: false
                            });
                        }
                    }
                });
            }
        });

        //hapus berita
        $('body').on('click', '.btn-delete-berita', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var judul = $(this).data('nama');
            Swal.fire({
                title: 'Anda yakin ingin menghapus ' + judul + '?',
                text: "Anda tidak dapat membatalkan aksi ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'GET',
                        url: 'berita/delete/' + id,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            if(data.status == 'deleted') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Delete',
                                    text: 'Berhasil menghapus Berita!',
                                    timer: 1200,
                                    showConfirmButton: false
                                });
                                loadDataBerita();
                            }
                        }
                    });

                }
            })
        });

        // Show Detail
        $('body').on('click', '.btn-show-berita', function(e) {
          e.preventDefault();
          var id = $(this).data('id');
          var host = window.location.origin;
          $.ajax({
              type: 'GET',
              url: 'berita/show/' + id,
              contentType: false,
              processData: false,
              success: function(data) {
                  $('#showBeritaModal').modal('show');
                  $('#image-show-berita').attr('src', host + '/' + data.data.gambar);
                  $('#judul-berita-show').val(data.data.judul);
                  tinymce.get('deskripsi-berita-show').setContent(data.data.deskripsi);
                  tinymce.get('deskripsi-berita-show').setMode('readonly');
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
