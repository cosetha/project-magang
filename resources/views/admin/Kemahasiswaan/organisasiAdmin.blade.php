@extends('layouts.adminLayout')
@section('title', 'Organisasi Mahasiswa')

@section('content')

<script type="text/javascript">
    document.getElementById('kemahasiswaan').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Organisasi</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Organisasi</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#OrganisasiModal">+ Add Organisasi</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div id="datatable-organisasi"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->

<!-- Add Organisasi Modal-->
<div class="modal fade" id="OrganisasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Organisasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-tambah-organisasi">
                <div class="modal-body">
                @csrf

                    <label for="nama">Nama Organisasi</label>
                    <input type="text" class="form-control" id="nama" name="nama">

                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"></textarea>

                    <div class="form-group mt-3">
                        <label for="file-upload" style="padding-right:21px;">Logo</label>
                        <input input id="file-upload" type="file" name="logo" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal" id="close-modal-tambah">Cancel</button>
                    <button class="btn btn-primary" type="submit" id="btn-tambah-organisasi">Submit</button>
                    <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Organisasi Modal-->
<div class="modal fade" id="editOrganisasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Organisasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-edit-organisasi">
                <div class="modal-body">
                @csrf

                    <label for="edit-nama">Nama Organisasi</label>
                    <input type="text" class="form-control" id="edit-nama" name="edit-nama">

                    <label for="edit-deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="edit-deskripsi" name="edit-deskripsi"> </textarea>

                    <div class="form-group mt-3">
                        <img id="image-edit" src="" style="width: 100%; height: 100%; border-radius: 10px;" alt="">
                    </div>

                    <div class="form-group mt-3">
                        <label for="file" style="padding-right:21px;">Logo</label>
                        <input input id="file-upload-edit" type="file" name="logo" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>
                    <input type="hidden" name="edit-id" value="">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit" id="btn-edit-organisasi">Submit</button>
                    <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Detail Organisasi Modal-->
<div class="modal fade" id="detailOrganisasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Organisasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form accept-charset="utf-8" enctype="multipart/form-data">
                <div class="modal-body">
                @csrf

                    <label for="edit-nama">Nama Organisasi</label>
                    <input type="text" class="form-control" id="detail-nama" name="detail-nama" readonly>

                    <label for="edit-deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="detail-deskripsi" name="detail-deskripsi"> </textarea>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Organisasi Modal-->
<div class="modal fade" id="deleteOrganisasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus data organisasi?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-ajax')
    <script type="text/javascript" src="{{asset('js/Kemahasiswaan/organisasi.js')}}"></script>
@endsection
