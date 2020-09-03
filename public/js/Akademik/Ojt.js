$(document).ready(function () {
    LoatTableOjt();
    function LoatTableOjt() {
        $("#datatable-ojt").load("/load/table-ojt", function () {
            $("#tbl-ojt").DataTable({
                columnDefs: [{ className: "align-middle", targets: "_all" }],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/load/data-ojt",
                    type: "get",
                },
                columns: [
                    {
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        searchable: false,
                    },
                    {
                        data: "judul",
                        name: "judul",
                    },
                    {
                        data: "menu",
                        name: "menu",
                        searchable: false,
                        orderable: false,
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
    $("body").on("submit", "#form-ojt", function (e) {
        e.preventDefault();
        $(".btn-close").css("display", "none");
        $(".btn-loading").css("display", "");
        $("#btn-submit-ojt").css("display", "none");
        var formData = new FormData();
        var judul = $("input[name=judul]").val();
        var deskripsi = tinymce.get("deskripsi").getContent();
        var menu = $("input[name=menu]").val();
        var token = $("input[name=token]").val();
        formData.append("_token", token);
        formData.append("judul", judul);
        formData.append("deskripsi", deskripsi);
        formData.append("menu", menu);
        $.ajax({
            type: "post",
            url: "/admin/tambah-ojt",
            data: formData,
            processData: false,
            contentType: false,
            accepts: "application / json",
            success: function (response) {
                $(".btn-close").css("display", "");
                $(".btn-loading").css("display", "none");
                $("#btn-submit-ojt").css("display", "");
                if (response.hasOwnProperty("error")) {
                    Swal.fire({
                        icon: "error",
                        title: "Ooopss...",
                        text: response.error,
                        timer: 1200,
                        showConfirmButton: false,
                    });
                } else {
                    $("#OjtModal").modal("hide");
                    $("#form-ojt").trigger("reset");
                    LoatTableOjt();
                    Swal.fire({
                        icon: "success",
                        title: response.message,
                        text: "Berhasil Menambahkan Ojt",
                        timer: 1200,
                        showConfirmButton: false,
                    });
                }
            },
            error: function (err) {
                console.log(err);
            },
        });
    });

    $("body").on("click", ".btn-delete-ojt", function (e) {
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
                    url: "/admin/delete-ojt/" + id,
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
                                text: "Berhasil Menghapus Ojt " + nama,
                                timer: 2000,
                                showConfirmButton: false,
                            });
                        }
                        LoatTableOjt();
                    },
                    error: function (err) {
                        console.log(err);
                    },
                });
            }
        });
    });

    $("body").on("click", ".btn-edit-ojt", function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        $(".btn-close-edit").css("display", "");
        $(".btn-loading-edit").css("display", "none");
        $("#btn-save-ojt").css("display", "");
        $("#judul-edit").attr("disabled", false);
        tinymce.get("deskripsi-edit").setMode("design");
        $.ajax({
            url: "/admin/edit-ojt/" + id,
            type: "GET",
            success: function (res) {
                $("#editOjtModal").modal({
                    backdrop: "static",
                    keyboard: false,
                });
                $("#editOjtModal").modal("show");
                $("#modal-title-ojt-edit").html("Edit Ojt");
                $("#btn-save-ojt").css("display", "");
                $("input[name=id-edit]").val(id);
                $("#judul-edit").val(res.values.judul);
                $("#menu-edit").val(res.values.menu);
                tinymce.get("deskripsi-edit").setContent(res.values.deskripsi);
            },
        });
        return false;
    });

    $("body").on("click", ".btn-show-ojt", function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        $(".btn-close-edit").css("display", "");
        $(".btn-loading-edit").css("display", "none");
        $("#btn-save-ojt").css("display", "none");
        $.ajax({
            url: "/admin/edit-ojt/" + id,
            type: "GET",
            success: function (res) {
                $("#editOjtModal").modal({
                    backdrop: "static",
                    keyboard: false,
                });
                $("#editOjtModal").modal("show");
                $("#modal-title-ojt-edit").html("Detail Ojt");
                $("#btn-simpan-ojt").css("display", "");
                $("input[name=id-edit]").val(id);
                $("#judul-edit").val(res.values.judul);
                $("#menu-edit").val(res.values.menu);
                tinymce.get("deskripsi-edit").setContent(res.values.deskripsi);
                $("#judul-edit").attr("disabled", true);
                tinymce.get("deskripsi-edit").setMode("readonly");
            },
        });
        return false;
    });

    $("body").on("submit", "#form-ojt-edit", function (e) {
        e.preventDefault();
        $(".btn-close-edit").css("display", "none");
        $(".btn-loading-edit").css("display", "");
        $("#btn-save-ojt").css("display", "none");
        var formData = new FormData();
        var judul = $("input[name=judul-edit]").val();
        var deskripsi = tinymce.get("deskripsi-edit").getContent();
        var menu = $("input[name=menu-edit]").val();
        var token = $("input[name=token]").val();
        var id = $("input[name=id-edit]").val();
        formData.append("_token", token);
        formData.append("judul", judul);
        formData.append("deskripsi", deskripsi);
        formData.append("menu", menu);

        $.ajax({
            type: "POST",
            url: "/admin/konfirmasi-edit-ojt/" + id,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $(".btn-close-edit").css("display", "");
                $(".btn-loading-edit").css("display", "none");
                $("#btn-save-ojt").css("display", "");
                if (response.hasOwnProperty("error")) {
                    Swal.fire({
                        icon: "error",
                        title: "Ooopss...",
                        text: response.error,
                        timer: 1200,
                        showConfirmButton: false,
                    });
                } else {
                    $("#editOjtModal").modal("hide");
                    $("#form-ojt-edit").trigger("reset");
                    LoatTableOjt();
                    Swal.fire({
                        icon: "success",
                        title: response.message,
                        text: "Berhasil Mengedit Ojt",
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
});
