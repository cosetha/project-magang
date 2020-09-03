@extends('layouts/adminLayout')
@section('title', 'Data Alumni')

@section('content')

<script type="text/javascript">
    document.getElementById('kemahasiswaan').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Alumni</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Alumni</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#AlumniModal">+ Add Data Alumni</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div id="datatable-alumni"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->


<!-- Add Alumni Modal-->
<div class="modal fade" id="AlumniModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Alumni</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-alumni">
                    @csrf

                    <label for="namaalumni">Nama Alumni</label>
                    <input type="text" class="form-control" id="nama" name="nama">

                    <div class="form-group">
                        <label for="bk" class="mt-2">Bidang Keahlian</label>
                        <select class="form-control" id="bk" name="bk">
                            <option value="" hidden> -- Pilih Bidang Keahlian -- </option>
                            @foreach($bidang as $b)
                            <option value="{{$b->id}}">{{$b->nama_bk}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label for="angkatan" class="mt-2">Angkatan</label>
                    <input type="text" class="form-control years-picker" id="angkatan" name="angkatan" readonly/>

                    <label for="lulus" class="mt-2">Lulus</label>
                    <input type="text" class="form-control years-picker" id="lulus" name="lulus" readonly/>

                



            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="btn-submit-alumni">Submit</button>
                <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Memproses...
                </button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Alumni Modal-->
<div class="modal fade" id="editAlumniModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Alumni</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-alumni-edit">
                    @csrf

                    <label for="namaalumni">Nama Alumni</label>
                    <input type="text" class="form-control" id="nama-edit" name="nama-edit">

                    <div class="form-group">
                        <label for="bk" class="mt-2">Bidang Keahlian</label>
                        <select class="form-control" id="bk-edit" name="bk-edit">
                            @foreach($bidang as $b)
                            <option value="{{$b->id}}">{{$b->nama_bk}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label for="angkatan" class="mt-2">Angkatan</label>
                    <input type="text" class="form-control years-picker" id="angkatan-edit" name="angkatan-edit" readonly/>
                    <input type="hidden" class="form-control " id="id-edit" name="id-edit" readonly/>
                    <label for="lulus" class="mt-2">Lulus</label>
                    <input type="text" class="form-control years-picker" id="lulus-edit" name="lulus-edit" readonly/>

               

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close-edit" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="btn-save-alumni">Save</button>
                <button class="btn btn-primary btn-loading-edit" type="button" style="display: none;" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Memproses...
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('js-ajax')
<script src="{{ asset('js/datepicker.js') }}"></script>
<script src="{{ asset('js/Kemahasiswaan/Alumni.js') }}"></script>
@endsection
