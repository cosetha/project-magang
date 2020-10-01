@extends('layouts.adminLayout')
@section('title', 'Fasilitas')

@section('content')

<script type="text/javascript">
    document.getElementById('fasilitas').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Fasilitas</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Fasilitas</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#FasilitasModal">+
                Add Fasilitas</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <div id="datatable-fasilitas"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<!-- Add Fasilitas Modal-->
<div class="modal fade" id="FasilitasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Fasilitas</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-tambah-fasilitas">
                    @csrf

                    <label for="nama_fasilitas">Nama Fasilitas</label>
                    <input type="text" class="form-control" id="nama_fasilitas" name="nama_fasilitas">

                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi-tambah" name="deskripsi-tambah"> </textarea>

                    <div class="form-group mt-3">
                        <label for="gambar">Gambar</label>
                        <input input id="file-upload" type="file" name="gambar" accept="image/png, image/jpg, image/jpeg" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary btn-submit" type="button" id="btn-tambah-fasilitas">Submit</button>
                <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Memproses...
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Fasilitas Modal-->
<div class="modal fade" id="editFasilitasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Fasilitas</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-edit-fasilitas">
                <div class="modal-body">
                    @csrf

                    <label for="nama_fasilitas">Nama Fasilitas</label>
                    <input type="text" class="form-control" id="edit-nama_fasilitas" name="edit-nama_fasilitas">

                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="edit-deskripsi" name=""> </textarea>

                    <div class="form-group mt-3">
                        <img id="image-edit" src="" style="width: 100%; height: 100%; border-radius: 10px;" alt="">
                    </div>

                    <div class="form-group mt-3">
                        <label for="file">Gambar</label>
                        <input input id="file-upload-edit" type="file" name="gambar" accept="image/png, image/jpg, image/jpeg" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>
                    <input type="hidden" name="edit-id" value="">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary btn-save" id="btn-edit-fasilitas" type="submit">Save</button>
                    <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- show berita Modal-->
<div class="modal fade" id="showFasilitasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Fasilitas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="">
                    @csrf

                    <label for="judulBerita" class="mt-2">Nama Fasilitas</label>
                    <input type="text" class="form-control" id="nama-fasilitas-show" disabled>

                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi-fasilitas-show" name="deskripsi-fasilitas-show"> </textarea>

                    <div class="form-group mt-3">
                        <img id="image-fasilitas-show" style="width: 50%; height: 50%; display: block; margin-left: auto; margin-right: auto;" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-ajax')
    <script src="{{ asset('js/Fasilitas/fasilitas.js') }}"></script>
@endsection
