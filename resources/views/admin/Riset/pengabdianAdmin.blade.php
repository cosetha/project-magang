@extends('layouts.adminLayout')
@section('title', 'Pengabdian')

@section('content')

<script type="text/javascript">
    document.getElementById('riset').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengabdian</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>


    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Pengabdian</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#PengabdianModal">+
                Add Pengabdian</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <div id="datatable-pengabdian"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->


<!-- Add Pengabdian Modal-->
<div class="modal fade" id="PengabdianModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengabdian</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-tambah-pengabdian">
                <div class="modal-body">
                @csrf

                    <label for="judul">Judul Pengabdian</label>
                    <input type="text" class="form-control" id="judul" name="judul">

                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>

                    <label for="tahun" class="mt-2">Tahun</label>
                    <input type="text" class="form-control years-picker" id="tahun" name="tahun" readonly/>

                    <div class="form-group mt-3">
                        <label for="file">Gambar</label>
                        <input input id="file-upload" type="file" name="gambar" accept="image/png, image/jpg, image/jpeg" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" id="close-modal-tambah">Cancel</button>
                    <button class="btn btn-primary" type="button" id="btn-tambah-pengabdian">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Pengabdian Modal-->
<div class="modal fade" id="editPengabdianModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pengabdian</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-edit-pengabdian">
                <div class="modal-body">
                @csrf

                    <label for="edit-judul">Judul Pengabdian</label>
                    <input type="text" class="form-control" id="edit-judul" name="edit-judul">

                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea class="form-control" id="edit-deskripsi" name="deskripsi"> </textarea>

                    <label for="tahun-edit" class="mt-2">Tahun</label>
                    <input type="text" class="form-control years-picker" id="tahun-edit" name="tahun-edit" readonly/>

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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="button" id="btn-edit-pengabdian">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Pengabdian Modal-->
<div class="modal fade" id="deletePengabdianModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus data Pengabdian?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js-ajax')
      <script src="{{ asset('js/datepicker.js') }}"></script>
      <script src="{{ asset('js/Riset/pengabdian.js') }}"></script>
@endsection
