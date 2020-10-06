@extends('layouts/adminLayout')
@section('title', 'Jadwal Kuliah')

@section('content')

<script type="text/javascript">
    document.getElementById('akademik').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jadwal Kuliah</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Jadwal</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a class="btn btn-primary ml-2" href="#" data-toggle="modal" id="btn-tambah-jadwal">+ Add Jadwal Kuliah</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div id="datatable-jadwal"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->

<!-- Add Jadwal Modal-->
<div class="modal fade" id="JadwalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Kuliah</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-tambah-jadwal">
                    @csrf

                    <label for="namajadwal" class="mt-2">Nama Jadwal</label>
                    <input type="text" class="form-control" id="" name="nama-jadwal">

                    <div class="form-group">
                        <label for="semester" class="mt-2">Semester</label>
                        <select class="form-control" id="list-semester" name="">

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bidang-keahlian" class="mt-2">Bidang Keahlian</label>
                        <select class="form-control" id="list-bk" name=""></select>
                    </div>

                    <div class="form-group mt-3">
                    <label for="file">File harus doc,docx,pdf,xls,xlsx</label>
                    <br>
                        <label for="file">File</label>
                        <input input id="file-upload" type="file" name="pdf" accept="application/pdf" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" name="" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit jadwal Modal-->
<div class="modal fade" id="editJadwalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit jadwal</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-edit-jadwal">
                    @csrf

                    <label for="namajadwal" class="mt-2">Nama Jadwal</label>
                    <input type="text" class="form-control" id="nama-jadwal-edit" name="nama-jadwal-edit">

                    <div class="form-group">
                        <label for="semester" class="mt-2">Semester</label>
                        <select class="form-control" id="list-semester-edit" name="">

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bidang-keahlian" class="mt-2">Bidang Keahlian</label>
                        <select class="form-control" id="list-bk-edit" name="">

                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="file">View File</label>
                        <br>
                        <a href="" id="file"></a>
                    </div>
                    <div class="form-group mt-3">
                        <label for="file">File</label>
                        <input input id="file-upload-edit" type="file" name="pdf" accept="application/pdf" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" name="" value="Submit">
                        <input type="hidden" name="edit-id" value="">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Sosmed Modal-->
<div class="modal fade" id="deleteJadwalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus data jadwal kuliah?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="#" id="btn-confirm-hapus">Delete</a>
                <input type="hidden" name="hapus-id" value="">
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-ajax')
    <script src="{{ asset('js/Akademik/jadwalKuliah.js') }}"></script>
@endsection
