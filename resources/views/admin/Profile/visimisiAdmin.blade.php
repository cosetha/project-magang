@extends('layouts/adminLayout')
@section('title', 'Visi dan Misi')

@section('content')

<script type="text/javascript">
    document.getElementById('profile').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Visi dan Misi</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Visi dan Misi</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#VisimisiModal">+ Add Visi & Misi</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div id="datatable-visimisi"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->

<!-- Add visimisi Modal-->
<div class="modal fade" id="VisimisiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Visi dan Misi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-visimisi" >
                    @csrf

                    <label for="judulvisimisi">Judul Visi dan Misi</label>
                    <input type="text" class="form-control" id="judul" name="judul">

                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"> </textarea>
                    <div class="form-group mt-3">
                        <input type="hidden" name="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="menu" value="Visi dan Misi"/>
                    </div>
               
            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="btn-submit-visimisi">Submit</button>
                <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Memproses...
                </button>
            </div>
                </form>
        </div>
    </div>
</div>

<!-- Edit visimisi Modal-->
<div class="modal fade" id="editVisimisiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title-visimisi-edit">Edit Visi dan Misi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-visimisi-edit">
                    @csrf
                    <label for="judulvisimisi">Judul Visi dan Misi</label>
                    <input type="text" class="form-control" id="judul-edit" name="judul-edit">
                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi-edit" name="deskripsi-edit"> </textarea>
                    <div class="form-group mt-3">
                        <input type="hidden" name="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id-edit" value=""/>
                        <input type="hidden" name="menu-edit" value="Visi dan Misi"/>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close-edit" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="btn-save-visimisi">Save</button>
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
    <script src="{{ asset('js/Profile/Visimisi.js') }}"></script>
@endsection