@extends('layouts/adminLayout')
@section('title', 'FAQ')

@section('content')

<script type="text/javascript">
    document.getElementById('footer').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">FAQ</h1>
    </div>


    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables FAQ</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary btn-modal-faq ml-2" href="#" data-toggle="modal" data-target="#TambahFaqModal">+
                Add Jabatan</a>
        </div>

        <div class="card-body">
            <div id="datatable-faq"></div>
        </div>
    </div>
</div>
<!-- End of Main Content -->


<!-- FAQ Modal-->
<div class="modal fade" id="TambahFaqModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modal-title-faq" id="exampleModalLabel">Tambah Frequently Asked Questions</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-tambah-faq">
                    @csrf

                    <label for="Pertanyaan">Pertanyaan</label>
                    <input type="text" class="form-control" name="pertanyaan" required>

                    <label for="Jawaban">Jawaban</label>
                    <input type="text" class="form-control" name="jawaban" required>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="btn-submit-faq">Submit</button>
                <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Memproses...
                </button>
            </div>

            </form>
        </div>
    </div>
</div>


<!-- Edit FAQ Modal-->
<div class="modal fade" id="EditFaqModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Frequently Asked Questions</h5>
                <button class="close btn-close-edit" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-edit-faq">
                    @csrf

                    <label for="pertanyaan_edit">Pertanyaan</label>
                    <input type="text" class="form-control" id="kolom-pertanyaan" name="pertanyaan_edit" required>

                    <label for="jawaban_edit">Jawaban</label>
                    <input type="text" class="form-control" id="kolom-jawaban" name="jawaban_edit" required>
                

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close-edit" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary btn-close-edit" id="btn-save-faq">Save</button>
                <button class="btn btn-primary btn-loading-edit" type="button" style="display: none;" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Memproses...
                </button>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- Delete FAQ Modal-->
<div class="modal fade" id="deleteFaqModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus data FAQ ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

@endsection