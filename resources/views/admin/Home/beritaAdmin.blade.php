@extends('layouts/adminLayout')
@section('title', 'Berita')

@section('content')

<script type="text/javascript">
    document.getElementById('home').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Berita</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>


    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Berita</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#BeritaModal">+
                Add Berita</a>
            </div>

            <div class="d-sm-flex align-items-center m-3">
            <i type="button" class="far fa-eye" data-toggle="modal" data-target="#previewBeritaModal">Preview</i>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <div id="datatable-berita"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->


<!-- Add Berita Modal-->
<div class="modal fade" id="BeritaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-tambah-berita">
                    @csrf

                    <label for="judulBerita">Judul Berita</label>
                    <input type="text" class="form-control" id="" name="judul">


                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi-berita" name=""> </textarea>

                    <div class="form-group mt-3">
                        <label for="file" class="mt-2">Gambar</label>
                        <input input id="file-upload" type="file" name="gambar" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>


                </form>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="btn-tambah-berita" type="button" data-penulis="{{ auth()->user()->id }}">Submit</button>
            </div>
        </div>
    </div>
</div>


<!-- Edit berita Modal-->
<div class="modal fade" id="editBeritaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Berita</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-edit-berita">
                    @csrf

                    <label for="judulBerita" class="mt-2">Judul Berita</label>
                    <input type="text" class="form-control" id="judul-berita-edit" name="judul-berita-edit">


                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi-berita-edit" name=""> </textarea>

                    <div class="form-group mt-3">
                        <img id="image-edit-berita" src="" style="width: 100%; height: 100%; border-radius: 10px;" alt="">
                    </div>

                    <div class="form-group mt-3">
                        <label for="file">Gambar</label>
                        <input id="file-upload-edit" type="file" name="gambar" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                        <input type="hidden" name="edit-id" value="">
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="btn-edit-berita" type="button" data-penulis="{{ auth()->user()->id }}">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete berita Modal-->
<div class="modal fade" id="deleteBeritaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus berita?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

<!-- preview berita Modal-->
    <div class="modal fade" id="previewBeritaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Preview Berita</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="container-sm-3">
                        <h3 for="preview-thumbnail">Thumbnail</h3>

                        <div class="row mt-4">
                            <div class="col-sm background-card mb-row mx-4">
                                <div class="card mt-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Contoh Berita 1</h5>
                                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm background-card mx-auto">
                                <div class="card mt-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Judul Berita Nanti Disini</h5>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam optio recusandae expedita a modi quae aliquid ratione ipsam quis? Velit sint doloribus nobis ex quod fugit fugiat facere vero illo?</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm background-card mb-row mx-4">
                                <div class="card mt-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Contoh Berita 3</h5>
                                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="container sm-3">
                        <h3 for="preview-halaman">Preview pada Halaman</h3>
                        <div class="col mt-4">
                            <h1 for="judul-berita" align="center">Judul Berita Nanti Disini</h1>
                            <img src="img/rog.jpg" class="img-fluid" alt="responsive image">
                            <figcaption class="figure-caption text-right">- Biasanya diisi caption gambar (dd/mm/yy) -</figcaption>
                        </div>
                        <div class="col mt-4">
                            <p for="deskripsi-berita" class="h5" >
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati fugiat adipisci soluta. Aliquid asperiores nihil eum dicta quidem officia placeat a, aliquam, dolorum, provident explicabo voluptatum enim. Placeat, eveniet saepe!
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque soluta vel eos, possimus molestias doloribus sint adipisci dolorem culpa accusantium, incidunt quos eius inventore, obcaecati fugit sunt. Laborum, praesentium molestiae!
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, ipsam earum numquam voluptatum expedita maiores repudiandae ullam quaerat a! Soluta repellat voluptatum consequuntur illo? Consequuntur, corrupti. Aliquid nesciunt quo rerum!
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam eos ex perspiciatis officia est voluptatem! Repudiandae aperiam unde, molestias optio tenetur recusandae quod voluptatibus. Necessitatibus odio in voluptatum. Similique, culpa!
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores maxime enim ex vero laboriosam, maiores provident a quibusdam magnam repellendus architecto, fugit rerum aliquam fugiat aspernatur est odio, possimus pariatur?
                            </p>
                            <p class="lead">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum consectetur repudiandae, incidunt natus porro sequi, iste magnam alias laborum expedita maxime fugit nisi temporibus in? Blanditiis laboriosam omnis adipisci similique.
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis reprehenderit dolor eligendi, doloribus, veniam ad est fugiat quo placeat rerum labore tempore repellendus assumenda quisquam voluptas, excepturi ratione magni accusamus!
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, veniam eum voluptatem aut pariatur ipsum, minima voluptas vitae dignissimos consequuntur cum asperiores impedit mollitia blanditiis non aliquid magnam repellat excepturi?
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit repellat possimus, explicabo dolorem fugit placeat debitis tempore architecto nulla in officia. Consectetur perferendis excepturi obcaecati perspiciatis. Exercitationem harum impedit tenetur.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime delectus veniam recusandae quas saepe officia corrupti quos ullam, sed repudiandae harum eum voluptas eligendi ipsum nisi molestiae eos cupiditate assumenda?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('js-ajax')
    <script src="{{ asset('js/home/berita.js') }}"></script>
    @endsection
