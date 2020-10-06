@extends('layouts.adminLayout')
@section('title', 'Penelitian')

@section('content')

<script type="text/javascript">
    document.getElementById('riset').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penelitian</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Penelitian</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#PenelitianModal">+
                Add Penelitian</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <div id="datatable-penelitian"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<!-- Add Penelitian Modal-->
<div class="modal fade" id="PenelitianModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Penelitian</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-tambah-penelitian">
                <div class="modal-body">
                @csrf

                    <label for="judul">Judul Penelitian</label>
                    <input type="text" class="form-control" id="judul" name="judul">

                    <label for="peneliti">Nama Peneliti</label>
                    <input type="text" class="form-control" id="peneliti" name="peneliti">

                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>

                    <label for="hasil_luaran" class="mt-2">Hasil Luaran</label>
                    <textarea type="text" class="form-control" id="hasil_luaran" name="hasil_luaran"></textarea>

                    <label for="tahun" class="mt-2">Tahun</label>
                    <input type="text" class="form-control years-picker" id="tahun" name="tahun" readonly/>

                    <div class="form-group mt-3">
                        <label for="file">Gambar</label>
                        <input id="file-upload" type="file" name="gambar" accept="image/png, image/jpg, image/jpeg" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal" id="close-modal-tambah">Cancel</button>
                    <button class="btn btn-primary" type="submit" id="btn-tambah-penelitian">Submit</button>
                    <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Penelitian Modal-->
<div class="modal fade" id="editPenelitianModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Penelitian</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-edit-penelitian">
                <div class="modal-body">
                @csrf

                    <label for="edit-judul">Judul Penelitian</label>
                    <input type="text" class="form-control" id="edit-judul" name="edit-judul">

                    <label for="edit-peneliti">Nama Peneliti</label>
                    <input type="text" class="form-control" id="edit-peneliti" name="edit-peneliti">

                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea class="form-control" id="edit-deskripsi" name="deskripsi"> </textarea>

                    <label for="edit_hasil_luaran" class="mt-2">Hasil Luaran</label>
                    <textarea type="text" class="form-control" id="edit_hasil_luaran" name="edit_hasil_luaran"> </textarea>

                    <label for="tahun-edit" class="mt-2">Tahun</label>
                    <input type="text" class="form-control years-picker" id="tahun-edit" name="tahun_edit" readonly/>

                    <div class="form-group mt-3">
                        <img id="image-edit" src="" style="height: 200px; border-radius: 10px;" alt="">
                    </div>

                    <div class="form-group mt-3">
                        <label for="file">Gambar</label>
                        <input id="file-upload-edit" type="file" name="gambar" accept="image/png, image/jpg, image/jpeg" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>
                    <input type="hidden" name="edit-id" value="">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit" id="btn-edit-penelitian">Submit</button>
                    <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Show Penelitian Modal-->
<div class="modal fade" id="showPenelitianModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Penelitian</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-show-penelitian">
                <div class="modal-body">
                @csrf

                    <label for="edit-judul">Judul Penelitian</label>
                    <input type="text" class="form-control" id="show-judul" name="show-judul" readonly>

                    <label for="edit-peneliti">Nama Peneliti</label>
                    <input type="text" class="form-control" id="show-peneliti" name="show-peneliti" readonly>

                    <label for="show-deskripsi" class="mt-2">Deskripsi</label>
                    <textarea class="form-control" id="show-deskripsi" name="show-deskripsi"> </textarea>

                    <label for="show_hasil_luaran" class="mt-2">Hasil Luaran</label>
                    <textarea type="text" class="form-control" id="show_hasil_luaran" name="show_hasil_luaran"> </textarea>

                    <label for="show-tahun">Tahun</label>
                    <input type="text" class="form-control" id="show-tahun" name="show-tahun" readonly>

                    <div class="form-group mt-3">
                        <img id="show-image" src="" style="height: 200px; border-radius: 10px;" alt="">
                    </div>

                    <input type="hidden" name="edit-id" value="">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js-ajax')
    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script src="{{ asset('js/Riset/penelitian.js') }}"></script>
@endsection
