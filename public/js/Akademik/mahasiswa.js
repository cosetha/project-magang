$(document).ready(function () {
    LoadTableMahasiswa();
    function LoadTableMahasiswa() {
        AlertCount();
        $("#datatable-mahasiswa").load("/load/table-mahasiswa", function () {
            $("#table-mahasiswa").DataTable({
                columnDefs: [{ className: "align-middle", targets: "_all" }],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/load/data-mahasiswa",
                    type: "get",
                },
                columns: [
                    {
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        searchable: false,
                    },
                    {
                        data: "nama",
                        name: "nama",
                    },
                    {
                        data: "nim",
                        name: "nim",
                    },

                    {
                        data: "bidang_keahlian",
                        render: function (data, type, row) {
                            //return data.length;
                            var txt = "";
                            data.forEach(function (item) {
                                if (txt.length > 0) {
                                    txt += ", ";
                                }
                                txt += item.nama_bk;
                            });
                            return txt;
                        },
                    },
                    {
                        data: "angkatan",
                        name: "angkatan",
                    },
                    {
                        data: "aksi",
                        name: "aksi",
                        searchable: false,
                        orderable: false,
                    },
                ],
            });
        });
    }

    //TAMBAH JAWABAN
    $("body").on("submit", "#form-mahasiswa", function (e) {
        e.preventDefault();
        $(".btn-close").css("display", "none");
        $(".btn-loading").css("display", "");
        $("#btn-submit-mahasiswa").css("display", "none");
        var formData = new FormData();
        var nama = $("input[name=nama]").val();
        var nim = $("input[name=nim]").val();
        var angkatan = $("input[name=angkatan]").val();
        var bk = $("#bk").val();
        var token = $("input[name=token]").val();
        formData.append("_token", token);
        formData.append("nama", nama);
        formData.append("nim", nim);
        formData.append("angkatan", angkatan);
        formData.append("bk", bk);
        console.log(bk);
        $.ajax({
            type: "post",
            url: "/admin/tambah-mahasiswa",
            data: formData,
            processData: false,
            contentType: false,
            accepts: "application / json",
            success: function (response) {
                $(".btn-close").css("display", "");
                $(".btn-loading").css("display", "none");
                $("#btn-submit-mahasiswa").css("display", "");
                LoadTableMahasiswa();
                if (response.hasOwnProperty("error")) {
                    Swal.fire({
                        icon: "error",
                        title: "Ooopss...",
                        text: response.error,
                        timer: 3000,
                        showConfirmButton: false,
                    });
                } else {
                    $("#MahasiswaModal").modal("hide");
                    $("#form-mahasiswa").trigger("reset");
                    Swal.fire({
                        icon: "success",
                        title: response.message,
                        text: "Berhasil Menambahkan Mahasiswa",
                        timer: 2000,
                        showConfirmButton: false,
                    });
                }
            },
            error: function (err) {
                console.log(err);
            },
        });
    });

    $("body").on("click", ".btn-delete-mahasiswa", function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        var nama = $(this).attr("data-nama");
        Swal.fire({
            title: "Hapus " + nama + "?",
            text: "Anda tidak dapat mengurungkan aksi ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    accepts: "application/json",
                    type: "get",
                    url: "/admin/delete-mahasiswa/" + id,
                    success: function (response) {
                        if (response.hasOwnProperty("error")) {
                            Swal.fire({
                                icon: "error",
                                title: "Ooopss...",
                                text: response.error,
                                timer: 1200,
                                showConfirmButton: false,
                            });
                        } else {
                            Swal.fire({
                                icon: "success",
                                title: response.message,
                                text: "Berhasil Menghapus Mahasiswa" + nama,
                                timer: 2000,
                                showConfirmButton: false,
                            });
                        }
                        LoadTableMahasiswa();
                    },
                    error: function (err) {
                        console.log(err);
                    },
                });
            }
        });
    });

    $("body").on("click", ".btn-edit-mahasiswa", function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        console.log(id);
        $.ajax({
            url: "/admin/edit-mahasiswa/" + id,
            type: "GET",
            success: function (res) {
                $("#editMahasiswaModal").modal({
                    backdrop: "static",
                    keyboard: false,
                });
                $("#editMahasiswaModal").modal("show");
                $("#btn-save-mahasiswa").css("display", "");
                $("input[name=id-edit]").val(id);
                $("#nama-edit").val(res.values.nama);
                $("#bk-edit").val(res.values.kode_bk);
                $("#nim-edit").val(res.values.nim);
                $("#angkatan-edit").val(res.values.angkatan);
            },
        });
        return false;
    });
    $("body").on("submit", "#form-mahasiswa-edit", function (e) {
        e.preventDefault();
        $(".btn-close-edit").css("display", "none");
        $(".btn-loading-edit").css("display", "");
        $("#btn-save-mahasiswa").css("display", "none");
        var formData = new FormData();
        var nama = $("input[name=nama-edit]").val();
        var nim = $("input[name=nim-edit]").val();
        var angkatan = $("input[name=angkatan-edit]").val();
        var bk = $("#bk-edit").val();
        var token = $("input[name=token]").val();
        var id = $("input[name=id-edit]").val();
        formData.append("_token", token);
        formData.append("nama", nama);
        formData.append("nim", nim);
        formData.append("angkatan", angkatan);
        formData.append("bk", bk);

        $.ajax({
            type: "POST",
            url: "/admin/konfirmasi-edit-mahasiswa/" + id,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $(".btn-close-edit").css("display", "");
                $(".btn-loading-edit").css("display", "none");
                $("#btn-save-mahasiswa").css("display", "");
                if (response.hasOwnProperty("error")) {
                    Swal.fire({
                        icon: "error",
                        title: "Ooopss...",
                        text: response.error,
                        timer: 1200,
                        showConfirmButton: false,
                    });
                } else {
                    LoadTableMahasiswa();
                    $("#editMahasiswaModal").modal("hide");
                    $("#form-mahasiswa-edit").trigger("reset");
                    Swal.fire({
                        icon: "success",
                        title: response.message,
                        text: "Berhasil Mengedit Mahasiswa",
                        timer: 1200,
                        showConfirmButton: false,
                    });
                }
            },
            error: function (err) {
                console.log(err);
            },
        });

        return false;
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
