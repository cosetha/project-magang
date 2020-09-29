@extends('layouts/adminLayout')
@section('title', 'Semester')

@section('content')

<script type="text/javascript">
    document.getElementById('MasterData').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Semester</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>


    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Semester</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <button class="btn btn-primary ml-2" id="OpenModalSMT">+
                Add Semester</a>
            </div>
            <div class="card-body">
                <div id="datatable-semester"></div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->


<!-- Add Sosmed Modal-->
<div class="modal fade" id="TambahSemesterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-semester" id="exampleModalLabel">Tambah Semester</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-tambah-semester">
                    @csrf

                    <label for="judulSemester">Semester</label>
                    <input type="number" class="form-control" id="semester-tambah" min="1" name="semester-tambah">

                    <input type="hidden" name="token" value="{{ csrf_token() }}">
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="btn-submit-semester">Submit</button>
                <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Memproses...
                </button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Sosmed Modal-->
<div class="modal fade" id="editSemesterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Semester</h5>
                <button class="close btn-close-edit" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-edit-semester">
                    @csrf

                    <label for="judulSemester">Semester</label>
                    <input type="number" class="form-control" id="semester-edit" min="1" name="semester-edit">

                    <input type="hidden" name="token-edit" value="{{ csrf_token() }}">
                    <input type="hidden" name="id-edit" id="id-edit" value="">
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close-edit" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="btn-save-semester">Save</button>
                <button class="btn btn-primary btn-loading-edit" type="button" style="display: none;" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Memproses...
                </button>
                <button type="button" class="btn btn-success btn-aktifkan" style="display: none">Aktifkan</button>
                <button type="button" class="btn btn-warning btn-nonaktifkan" style="display: none">Non-Aktifkan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Sosmed Modal-->
<div class="modal fade" id="deleteSemesterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus data Semester?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

@endsection

