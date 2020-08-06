@extends('layouts/adminLayout')
@section('title', 'Social Media')

@section('content')

<script type="text/javascript">
    document.getElementById('mininavbar').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Social Media</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Sosmed</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <button type="button" class="btn btn-primary ml-2" id="btn-modal-sosmed">+ Add Sosmed</a>
        </div>

        <div class="card-body">
            <div id="datatable-sosmed"></div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->


<!-- Add Sosmed Modal-->
<div class="modal fade" id="SosmedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Sosmed</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form accept-charset="utf-8" id="FormAddSosmed" enctype="multipart/form-data" method="post">
                    @csrf

                    <label for="namaweb">Nama Web</label>
                    <input type="text" class="form-control" id="nama_web" name="nama_web" required>

                    <label for="link_web" class="mt-2">Link Web</label>
                    <input type="text" class="form-control" id="link_Web" name="link" required>

                    <input type="hidden" class="form-control" id="jenis" name="menu" value="sosmed">

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary btn-submit-sosmed">Submit</button>
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
<div class="modal fade" id="editSosmedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Sosmed</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="FormEditSosmed">
                    @csrf

                    <input type="hidden" id="id-sosmed" value="">
                    <label for="namaweb">Nama Web</label>
                    <input type="text" class="form-control" id="edit_nama_web" name="nama_web" required>

                    <label for="link_web" class="mt-2">Link Web</label>
                    <input type="text" class="form-control" id="edit_link_web" name="link" required>

                    <input type="hidden" class="form-control" id="edit_jenis" name="menu" value="sosmed">



            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary btn-save-sosmed">Save</button>
                <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Memproses...
                </button>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- Delete Sosmed Modal-->
<div class="modal fade" id="deleteSosmedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus social media?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js-ajax')
      <script src="{{ asset('js/home/Weblink.js') }}"></script>
@endsection
