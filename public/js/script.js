$(document).ready(function() {

//------------------------------------------FITUR JABATAN------------------------------------------

  //DATATABLE JABATAN
  LoadTableJabatan()
  function LoadTableJabatan(){
    $("#datatable-jabatan").load("/load/table-jabatan", function(){
      $("#tbl-jabatan").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "/load/data-jabatan",
          type: "get"
        },
        columns: [
          {
            data: "DT_RowIndex",
            name: "DT_RowIndex",
            searchable: false
          },
          {
            data: "nama_jabatan",
            name: "nama_jabatan"
          },
          {
            data: "aksi",
            name: "aksi",
            searchable: false,
            orderable: false
          }

        ]
      })
    })
  }


  //TAMBAH JAWABAN
  $("body").on("submit","#form-tambah-jabatan", function(e){
    e.preventDefault();
    $(".btn-close").css("display","none")
    $(".btn-loading").css("display","")
    $("#btn-submit-jabatan").css("display","none")
    var data = $("#form-tambah-jabatan").serialize()
    $.ajax({
      type: "post",
      url: "/admin/tambah-jabatan",
      data: data,
      success: function(response){
        $(".modal-title-jabatan").html()
        $("#TambahJabatanModal").modal("hide");
        $("#form-tambah-jabatan").trigger("reset");
        $(".btn-close").css("display","")
        $(".btn-loading").css("display","none")
        $("#btn-submit-jabatan").css("display","")
        LoadTableJabatan()
        Swal.fire({
          icon: "success",
          title: "Sukses",
          text: "Berhasil Menambahkan Jabatan",
          timer: 1200,
          showConfirmButton: false
      });
      },
      error: function(err){
        console.log(err)
      }
    })
  })

  //DELETE JABATAN
  $("body").on("click",".btn-delete-jabatan", function(e){
    e.preventDefault()
    var id = $(this).attr("data-id")
    var nama = $(this).attr("data-nama")
    Swal.fire({
      title: "Hapus " + nama + "?",
      text: "Anda tidak dapat mengurungkan aksi ini!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, Hapus!"
      }).then(result => {
          if (result.value) {
              $.ajax({
                  type: "get",
                  url: "/admin/delete-jabatan/" + id,
                  success: function(response) {
                      Swal.fire(
                          "Deleted!",
                          nama + " telah dihapus.",
                          "success"
                      );
                      LoadTableJabatan();
                  },
                  error: function(err) {
                      console.log(err);
                  }
              });
          }
      });
  })

  $("body").on("click",".btn-edit-jabatan", function(e){
    e.preventDefault()
    var id = $(this).attr("data-id")
    var nama = $(this).attr("data-nama")
    $("#EditJabatanModal").modal("show")
    $("#btn-submit-jabatan").css("display","none")
    $("#btn-save-jabatan").css("display","")
    $("#kolom-jabatan").val(nama)

    $("body").on("submit","#form-edit-jabatan", function(e){
      e.preventDefault();
      $(".btn-close-edit").css("display","none")
      $(".btn-loading-edit").css("display","")
      $("#btn-save-jabatan").css("display","none")
      var data = $("#form-edit-jabatan").serialize()
      $.ajax({
        type: "post",
        url: "/admin/edit-jabatan/" + id,
        data: data,
        success: function(response){
          $("#EditJabatanModal").modal("hide");
          $("#form-edit-jabatan").trigger("reset");
          $(".btn-close-edit").css("display","")
          $(".btn-loading-edit").css("display","none")
          $("#btn-save-jabatan").css("display","")
          LoadTableJabatan()
          Swal.fire({
            icon: "success",
            title: "Sukses",
            text: "Berhasil Mengedit Jabatan",
            timer: 1200,
            showConfirmButton: false
        });
        },
        error: function(err){
          console.log(err)
        }
      })
    })
  })

//------------------------------------------END FITUR JABATAN-----------------------------------------


//------------------------------------------FITUR PROFILE---------------------------------------------

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

//update profile
$("body").on("click","#btn-save-change", function(e){
  e.preventDefault();
  alert('ok')
})

//ganti password
$("body").on("click","#btn-edit-password", function(e){
  e.preventDefault();
  var password = $("#password").val();
  var password_confirm = $("#password-confirm").val();
  var id = $(this).data("id");
  if(password == "" || password_confirm == "") {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Password tidak boleh kosong!',
      timer: 1000,
      showConfirmButton: false
    })
  } else {
    $.ajax({
      type: 'POST',
      url:"editpassword/" + id,
      data:{password:password,password_confirmation:password_confirm,id:id},
      dataType: 'json',
      success:function(data) {
        if(data.status == '1') {
          Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Sukses ganti password',
            timer: 1000,
            showConfirmButton: false
          })
        } else if(data.status == "0") {
          Swal.fire({
            icon: 'error',
            title: 'Ooopss...',
            text: 'Gagal ganti password',
            timer: 1000,
            showConfirmButton: false
          })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Ooopss...',
            text: 'Password harus sama!',
            timer: 1200,
            showConfirmButton: false
          })
        }
      }
    });
  }

})

});
