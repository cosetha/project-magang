$(document).ready(function () {
    LoatTableForm();
    function LoatTableForm() {
        AlertCount();
        $("#datatable-form").load("/load/table-form", function () {
            $("#tbl-form").DataTable({
                columnDefs: [{ className: "align-middle", targets: "_all" }],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/load/data-form",
                    type: "get",
                },
                columns: [
                    {
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        searchable: false,
                    },
                    {
                        data: "nama_form",
                        name: "nama_form",
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
    $("body").on("submit", "#form-form", function (e) {
        e.preventDefault();
        $(".btn-close").css("display", "none");
        $(".btn-loading").css("display", "");
        $("#btn-submit-form").css("display", "none");
        var formData = new FormData();
        formData.append("_token", $("input[name=_token]").val());
        formData.append("nama", $("input[name=nama]").val());
        formData.append("file", $("input[type=file]")[0].files[0]);
        $.ajax({
            type: "post",
            url: "/admin/tambah-form",
            data: formData,
            processData: false,
            contentType: false,
            accepts: "application / json",
            success: function (response) {
                $(".btn-close").css("display", "");
                $(".btn-loading").css("display", "none");
                $("#btn-submit-form").css("display", "");
                LoatTableForm();
                if (response.hasOwnProperty("error")) {
                    Swal.fire({
                        icon: "error",
                        title: "Ooopss...",
                        text: response.error,
                        timer: 2200,
                        showConfirmButton: false,
                    });
                    console.log(response.error);
                } else {
                    $("#FormModal").modal("hide");
                    $("#form-form").trigger("reset");
                    LoatTableForm();
                    Swal.fire({
                        icon: "success",
                        title: response.message,
                        text: "Berhasil MenambahkanForm",
                        timer: 1000,
                        showConfirmButton: false,
                    });
                }
            },
            error: function (err) {
                console.log(err);
            },
        });
    });

    $("body").on("click", ".btn-delete-form", function (e) {
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
                    url: "/admin/delete-form/" + id,
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
                                text: "Berhasil MenghapusForm " + nama,
                                timer: 2000,
                                showConfirmButton: false,
                            });
                        }
                        LoatTableForm();
                    },
                    error: function (err) {
                        console.log(err);
                    },
                });
            }
        });
    });

    $("body").on("click", ".btn-edit-form", function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");

        $(".btn-close-edit").css("display", "");
        $(".btn-loading-edit").css("display", "none");
        $("#btn-save-form").css("display", "");
        $("#nama-edit").attr("disabled", false);
        $("#file-upload-edit").css("display", "");

        $.ajax({
            url: "/admin/edit-form/" + id,
            type: "GET",
            success: function (res) {
                $("#editFormModal").modal({
                    backdrop: "static",
                    keyboard: false,
                });
                $("#editFormModal").modal("show");
                $("#modal-title-form-edit").html("Edit Form");
                $("#btn-save-form").css("display", "");
                $("input[name=id-edit]").val(id);
                $("#nama-edit").val(res.values.nama_form);
                $("#show-frame").remove();
            },
        });
        return false;
    });

    $("body").on("click", ".btn-show-form", function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        $(".btn-close-edit").css("display", "");
        $(".btn-loading-edit").css("display", "none");
        $("#btn-save-form").css("display", "none");
        $.ajax({
            url: "/admin/edit-form/" + id,
            type: "GET",
            success: function (res) {
                $("#editFormModal").modal({
                    backdrop: "static",
                    keyboard: false,
                });
                $("#editFormModal").modal("show");
                $("#modal-title-form-edit").html("Detail Form");
                $("#btn-simpan-form").css("display", "");
                $("input[name=id-edit]").val(id);
                $("#nama-edit").val(res.values.nama_form);
                $("#show-frame").remove();
                $(
                    '<div class="embed-responsive embed-responsive-16by9" id="show-frame"><iframe id="show-form-edit" class="embed-responsive-item" src="' +
                        res.values.file +
                        '"></iframe></div>'
                ).appendTo("#show");

                $("#nama-edit").attr("disabled", true);
                $("#file-upload-edit").css("display", "none");
            },
        });
        return false;
    });

    $("body").on("submit", "#form-form-edit", function (e) {
        e.preventDefault();
        $(".btn-close-edit").css("display", "none");
        $(".btn-loading-edit").css("display", "");
        $("#btn-save-form").css("display", "none");
        var formData = new FormData();
        var id = $("input[name=id-edit]").val();
        formData.append("_token", $("input[name=_token]").val());
        formData.append("nama", $("input[name=nama-edit]").val());
        formData.append("file", $("input[type=file]")[1].files[0]);
        $.ajax({
            type: "POST",
            url: "/admin/konfirmasi-edit-form/" + id,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $(".btn-close-edit").css("display", "");
                $(".btn-loading-edit").css("display", "none");
                $("#btn-save-form").css("display", "");
                if (response.hasOwnProperty("error")) {
                    Swal.fire({
                        icon: "error",
                        title: "Ooopss...",
                        text: response.error,
                        timer: 1200,
                        showConfirmButton: false,
                    });
                } else {
                    $("#editFormModal").modal("hide");
                    $("#form-form-edit").trigger("reset");
                    LoatTableForm();
                    Swal.fire({
                        icon: "success",
                        title: response.message,
                        text: "Berhasil Mengedit Form ",
                        timer: 2000,
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
