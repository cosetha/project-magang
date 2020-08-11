@extends('layouts.adminLayout')
@section('title', 'Fasilitas')

@section('content')

<script type="text/javascript">
    document.getElementById('fasilitas').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Fasilitas</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>


    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Fasilitas</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#FasilitasModal">+
                Add Fasilitas</a>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <div id="datatable-fasilitas"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->


<!-- Add Fasilitas Modal-->
<div class="modal fade" id="FasilitasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Fasilitas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-tambah-fasilitas">
                    @csrf

                    <label for="nama_fasilitas">Nama Fasilitas</label>
                    <input type="text" class="form-control" id="nama_fasilitas" name="nama_fasilitas">


                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi-tambah" name="deskripsi-tambah"> </textarea>

                    <div class="form-group mt-3">
                        <label for="gambar">Gambar</label>
                        <input input id="file-upload" type="file" name="gambar" accept="image/png, image/jpg, image/jpeg" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>


                </form>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal" id="close-modal-tambah">Cancel</button>
                <button class="btn btn-primary" type="button" id="btn-tambah-fasilitas">Submit</button>
            </div>
        </div>
    </div>
</div>


<!-- Edit Fasilitas Modal-->
<div class="modal fade" id="editFasilitasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Fasilitas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-edit-fasilitas">
                    @csrf

                    <label for="nama_fasilitas">Nama Fasilitas</label>
                    <input type="text" class="form-control" id="edit-nama_fasilitas" name="edit-nama_fasilitas">


                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="edit-deskripsi" name=""> </textarea>

                    <div class="form-group mt-3">
                        <label for="file">Gambar</label>
                        <input input id="file-upload-edit" type="file" name="gambar" accept="image/png, image/jpg, image/jpeg" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>
                    <input type="hidden" name="edit-id" value="">



            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="btn-edit-fasilitas" type="submit">Submit</button>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- Delete Fasilitas Modal-->
<div class="modal fade" id="deleteFasilitasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus Fasilitas?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js-ajax')
    <script src="{{ asset('js/fasilitas/fasilitas.js') }}"></script>
@endsection
