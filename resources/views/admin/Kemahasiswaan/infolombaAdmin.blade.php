@extends('layouts/adminLayout')
@section('title', 'Info Lomba / Seminar')

@section('content')

<script type="text/javascript">
    document.getElementById('kemahasiswaan').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Info Lomba / Seminar</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Lomba / Seminar</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#LombaModal">+ Add Lomba / Seminar</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div id="datatable-infoLomba"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->

<!-- Add Lomba Modal-->
<div class="modal fade" id="LombaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Lomba / Seminar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-tambah-lomba">
                <div class="modal-body">
                @csrf

                    <label for="judul">Judul Lomba / Seminar</label>
                    <input type="text" class="form-control" id="judul" name="judul">

                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"></textarea>

                    <label for="lokasi" class="mt-2">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal" id="close-modal-tambah">Cancel</button>
                    <button class="btn btn-primary" type="submit" id="btn-tambah-lomba">Submit</button>
                    <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Lomba Modal-->
<div class="modal fade" id="editLombaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Lomba / Seminar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-edit-lomba">
                <div class="modal-body">
                @csrf

                    <label for="edit-judul">Judul Lomba / Seminar</label>
                    <input type="text" class="form-control" id="edit-judul" name="edit-judul">

                    <label for="edit-deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="edit-deskripsi" name="edit-deskripsi"></textarea>

                    <label for="edit-lokasi" class="mt-2">Lokasi</label>
                    <input type="text" class="form-control" id="edit-lokasi" name="edit-lokasi">

                    <input type="hidden" id="edit-id" name="edit-id" value="">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit" id="btn-edit-lomba">Submit</button>
                    <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Lomba Modal-->
<div class="modal fade" id="deleteLombaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus Data ini?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

<!-- show lomba -->
<div class="modal fade" id="showLombaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Lomba / Seminar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form accept-charset="utf-8" enctype="multipart/form-data" action="" id="show-form">
                <div class="modal-body">
                @csrf

                    <label for="edit-judul">Judul Lomba / Seminar</label>
                    <input type="text" class="form-control" id="show-judul" name="edit-judul" disabled>

                    <label for="edit-deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="show-deskripsi" name="edit-deskripsi"></textarea>
                    <br>
                    <label for="edit-lokasi" class="mt-2">Lokasi</label>
                    <input type="text" class="form-control" id="show-lokasi" name="edit-lokasi" disabled>

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
      <script src="{{ asset('js/Kemahasiswaan/infoLomba.js') }}"></script>
@endsection
