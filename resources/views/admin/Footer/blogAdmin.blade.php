@extends('layouts/adminLayout')
@section('title', 'Blog')

@section('content')

<script type="text/javascript">
    document.getElementById('footer').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Blog</h1>
    </div>


    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Blog</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <button type="button" class="btn btn-primary ml-2" id="btn-modal-blog">+ Add Blog</button>
        </div>

        <div class="card-body">
            <div id="datatable-weblink"></div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->


<!-- Add Blog Modal-->
<div class="modal fade" id="BlogModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Blog</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form accept-charset="utf-8" id="FormAddBlog" enctype="multipart/form-data" method="post">
                    @csrf

                    <label for="namaweb">Nama Web</label>
                    <input type="text" class="form-control" id="nama_web" name="nama_web">

                    <label for="link_web" class="mt-2">Link Web</label>
                    <input type="text" class="form-control" id="link_Web" value="https://" name="link">

                    <input type="hidden" class="form-control" id="jenis" name="menu" value="blog">

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary btn-submit-blog">Submit</button>
                <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Memproses...
                </button>
            </div>

            </form>
        </div>
    </div>
</div>


<!-- Edit Blog Modal-->
<div class="modal fade" id="editBlogModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Blog</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="FormEditBlog">
                    @csrf

                    <input type="hidden" id="id-blog" value="">
                    <label for="namaweb">Nama Web</label>
                    <input type="text" class="form-control" id="edit_nama_web" name="nama_web">

                    <label for="link_web" class="mt-2">Link Web</label>
                    <input type="text" class="form-control" id="edit_link_web" name="link">



            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary btn-save-blog">Save</button>
                <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Memproses...
                </button>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- Delete Blog Modal-->
<div class="modal fade" id="deleteBlogModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus blog ini ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js-ajax')
      <script src="{{ asset('js/Footer/Blog.js') }}"></script>
@endsection
