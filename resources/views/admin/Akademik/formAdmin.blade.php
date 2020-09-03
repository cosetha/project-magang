@extends('layouts/adminLayout')
@section('title', 'Form')

@section('content')

<script type="text/javascript">
    document.getElementById('akademik').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Form</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#FormModal">+ Add Form</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div id="datatable-form"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->


<!-- Add Sosmed Modal-->
<div class="modal fade" id="FormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Form</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-form">
                    @csrf

                    <label for="namaform">Nama Form</label>
                    <input type="text" class="form-control" id="nama" name="nama" >


                    <div class="form-group mt-3">
                        <label for="file">File</label>
                        <input input id="file-upload" type="file" name="file" accept="file/*" aria-describedby="inputGroupFileAddon01" >
                    </div>
                    <input type="hidden" name="token" value="{{ csrf_token() }}">

              

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="btn-submit-form">Submit</button>
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
<div class="modal fade" id="editFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-form-edit">
                    @csrf

                    <label for="namaform">Nama Form</label>
                    <input type="text" class="form-control" id="nama-edit" name="nama-edit" >


                    <div class="form-group mt-3">
                        <label for="file">File</label>
                        <input input id="file-upload-edit" type="file" name="file-edit" accept="file/*" onchange="readURLb(this);" aria-describedby="inputGroupFileAddon01" >
                    </div>

                    <input type="hidden" name="token-edit" value="{{ csrf_token() }}">
                    <input type="hidden" name="id-edit" value=""/>
                    <div id="show">
                    </div>

            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary btn-close-edit" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="btn-save-form">Save</button>
                <button class="btn btn-primary btn-loading-edit" type="button" style="display: none;" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Memproses...
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Sosmed Modal-->
<div class="modal fade" id="deleteFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus form?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js-ajax')
      <script src="{{ asset('js/Akademik/Form.js') }}"></script>
@endsection