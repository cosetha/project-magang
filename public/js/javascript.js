$(document).ready(function() {

    //LOAD FASILITAS KAMPUS
    $.ajax({
        type: "get",
        url: "/load/layout_loop",
        success: function(response){
            console.log(response)

            $('#fasilitas_kampus').html('')
            $('#blog').html('')
            $('#faq').html('')
            let fasilitas = response.fasilitas
            let blog = response.blog
            let faq = response.faq

                $.each(fasilitas,function (i, data){
                    $("#fasilitas_kampus").append(`
                        <li>
                            <a href="" style="text-decoration:none;"><p>`+data.nama_fasilitas+`</p></a>
                        </li>
                    `)
                })

                $.each(blog,function (i, data){
                    $("#blog").append(`
                        <li>
                            <a href="`+data.link+`" style="text-decoration:none;"><p>`+data.nama_blog+`</p></a>
                        </li>
                    `)
                })

                $.each(faq,function (i, data){
                    $("#faq").append(`
                        <li>
                            <a href="" style="text-decoration:none;"><p>`+data.pertanyaan+`</p></a>
                        </li>
                    `)
                })
        },
        error: function(err){
            console.log(err)
        }
    })

});
