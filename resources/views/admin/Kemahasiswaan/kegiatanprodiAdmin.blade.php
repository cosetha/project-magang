@extends('layouts.adminLayout')
@section('title', 'Kegiatan Prodi')

@section('content')

<script type="text/javascript">
    document.getElementById('kemahasiswaan').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kegiatan Prodi</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Kegiatan</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#KegiatanModal">+ Add Kegiatan</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div id="datatable-kegiatan"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->


<!-- Add Kegiatan Modal-->
<div class="modal fade" id="KegiatanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-tambah-kegiatan">
                <div class="modal-body">
                @csrf

                    <label for="judul">Judul Kegiatan</label>
                    <input type="text" class="form-control" id="judul" name="judul">

                    <label for="lokasi" class="mt-2">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi">

                    <label for="tanggal" class="mt-2">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">

                    <label for="gambar" class="mt-2">Upload Gambar</label>
                    <textarea class="form-control" id="gambar" name="gambar"></textarea>

                    <div class="form-group mt-3">
                        <label for="file">Thumbnail</label>
                        <input input id="file-upload" type="file" name="thumbnail" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal" id="close-modal-tambah">Cancel</button>
                    <button class="btn btn-primary" type="submit" id="btn-tambah-kegiatan">Submit</button>
                    <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Kegiatan Modal-->
<div class="modal fade" id="editKegiatanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit kegiatan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-edit-kegiatan">
                <div class="modal-body">
                @csrf

                    <label for="edit-judul">Judul Kegiatan</label>
                    <input type="text" class="form-control" id="edit-judul" name="edit-judul">

                    <label for="edit-lokasi" class="mt-2">Lokasi</label>
                    <input type="text" class="form-control" id="edit-lokasi" name="edit-lokasi">

                    <label for="edit-tanggal" class="mt-2">Tanggal</label>
                    <input type="date" class="form-control" id="edit-tanggal" name="edit-tanggal">

                    <label for="edit-gambar" class="mt-2">Upload Gambar</label>
                    <textarea class="form-control" id="edit-gambar" name="edit-gambar"> </textarea>

                    <div class="form-group mt-3">
                        <img id="image-edit" src="" style="width: 100%; height: 100%; border-radius: 10px;" alt="">
                    </div>

                    <div class="form-group mt-3">
                        <label for="file">Thumbnail</label>
                        <input input id="file-upload-edit" type="file" name="thumbnail" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>
                    <input type="hidden" name="edit-id" value="">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit" id="btn-edit-kegiatan">Submit</button>
                    <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Kegiatan Modal-->
<div class="modal fade" id="deleteKegiatanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus Kegiatan?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js-ajax')
    <script type="text/javascript" src="{{asset('js/Kemahasiswaan/kegiatanProdi.js')}}"></script>
@endsection