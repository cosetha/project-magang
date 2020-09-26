@extends('layouts/adminLayout')
@section('title', 'Kalender Akademik')

@section('content')

<script type="text/javascript">
    document.getElementById('akademik').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kalender Akademik</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Kalender</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" id="btn-tambah-kalender">+ Add Kalender Akademik</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div id="datatable-kalender"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->


<!-- Add kalender Modal-->
<div class="modal fade" id="KalenderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kalender Akademik</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-tambah-kalender">
                    @csrf

                    <label for="namakegiatan">Nama Kalender</label>
                    <input type="text" class="form-control" id="" name="nama-kegiatan">

                    <div class="form-group">
                        <label for="semester" class="mt-2">Semester</label>
                        <select class="form-control" id="list-semester" name="">
                            <option value="" hidden> -- Pilih Semester -- </option>

                            <option value=""></option>
                        </select>
                    </div>

                    <label for="tanggalmulai" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi-kalender" name=""></textarea>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </div>


                </form>

            </div>

        </div>
    </div>
</div>


<!-- Edit kalender Modal-->
<div class="modal fade" id="editKalenderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kalender Akademik</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-edit-kalender">
                    @csrf

                    <label for="namakalender">Nama kalender</label>
                    <input type="text" class="form-control" id="nama-kegiatan-edit" name="nama-kegiatan-edit">

                    <div class="form-group">
                        <label for="semester" class="mt-2">Semester</label>
                        <select class="form-control" id="list-semester-edit" name="">
                            <option value="" hidden> -- Pilih Semester -- </option>

                            <option value=""></option>
                        </select>
                    </div>

                    <label for="tanggalmulai" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi-kalender-edit" name=""></textarea>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        <input type="hidden" name="edit-id" value="">
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<!-- show kalender Modal-->
<div class="modal fade" id="showKalenderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Kalender</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-show-kalender">
                    @csrf

                    <label for="namakalender">Nama kalender</label>
                    <input type="text" class="form-control" id="nama-kegiatan-show" name="nama-kegiatan-show" disabled>

                    <div class="form-group">
                        <label for="semester" class="mt-2">Semester</label>
                        <select class="form-control" id="list-semester-show" name="">
                            <option value="" hidden> -- Pilih Semester -- </option>

                            <option value=""></option>
                        </select>
                    </div>

                    <label for="tanggalmulai" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi-kalender-show" name=""></textarea>

                </form>

            </div>
        </div>
    </div>
</div>

<!-- push kalender Modal-->
<div class="modal fade" id="showKalenderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus data kalender akademik?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" type="button" id="btn-confirm-kalender">Delete</button>
                <input type="hidden" name="hapus-id" value="">
            </div>
        </div>
    </div>
</div>

@endsection
@section('js-ajax')
      <script src="{{ asset('js/Akademik/kalenderAkademik.js') }}"></script>
@endsection
