@extends('layouts/adminLayout')
@section('title', 'Bidang Keahlian')

@section('content')

<script type="text/javascript">
    document.getElementById('MasterData').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bidang Keahlian</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>


    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Bidang Keahlian</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#BKModal" data-backdrop="static" data-keyboard="false">+
                Add Bidang Keahlian</a>
            </div>
            <div class="table-responsive">
            <div class="card-body">
                <div id="datatable-bk"></div>
            </div>
            </div>
        </div>
    </div>
</div>
    <!-- End of Main Content -->


    <!-- Add BK Modal-->
    <div class="modal fade" id="BKModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title-bk" id="exampleModalLabel">Tambah Bidang Keahlian</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-tambah-bk">
                        @csrf
                        <label for="namaBK" class="mt-2">Nama Bidang Keahlian</label>
                        <input type="text" class="form-control" id="nama-tambah" name="nama-tambah" >

                        <label for="deskripsi" class="mt-2">Deskripsi</label>
                        <textarea type="text" class="form-control" id="deskripsi-tambah" name="deskripsi-tambah" > </textarea>

                        <input type="hidden" name="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="edit-id" value="">
                        <div class="form-group mt-3">
                            <label for="file" class="mt-2">Gambar</label>
                            <input input id="file-upload-tambah" type="file" name="gambar" accept="image/*" onchange="readURLa(this);" aria-describedby="inputGroupFileAddon01">
                            <script>
                                function readURLa(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function(e) {
                                        $('#blah').attr('src', e.target.result);
                                        }

                                        reader.readAsDataURL(input.files[0]); // convert to base64 string
                                    }
                                    }
                                </script>

                            <img id="blah" class = "rounded mx-auto d-block" height="200px" src="#" alt="your image" />
                        </div>


                </div>
                <div class="modal-footer">
                <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="btn-submit-bk">Submit</button>
                <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Memproses...
                </button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Edit BK Modal-->
    <div class="modal fade" id="editBKModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-bk">Edit Bidang Keahlian</h5>
                    <button class="close close-modal-bk" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-edit-bk">
                        @csrf
                        <input type="hidden" name="edit-id" value="">
                        <label for="namaBK" class="mt-2">Nama Bidang Keahlian</label>
                        <input type="text" class="form-control" id="nama-edit" name="nama-edit">

                        <label for="deskripsi" class="mt-2">Deskripsi</label>
                        <textarea type="text" class="form-control" id="deskripsi-edit" name="deskripsi-edit"> </textarea>


                        <div class="form-group mt-3">
                            <label for="file" class="mt-2">Gambar</label>
                            <input input id="file-upload-edit" type="file" name="gambar-edit" accept="image/*" onchange="readURLe(this);"  aria-describedby="inputGroupFileAddon01">
                            <script>
                                function readURLe(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function(e) {
                                        $('#blah-edit').attr('src', e.target.result);
                                        }

                                        reader.readAsDataURL(input.files[0]); // convert to base64 string
                                    }
                                    }
                                </script>
                            <img id="blah-edit" class = "rounded mx-auto d-block" height="200px" src="#" alt="your image" />
                        </div>
                </div>
                <div class="modal-footer">
                <button class="btn btn-secondary btn-close close-modal-bk" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="btn-save-bk">Save</button>
                <button class="btn btn-primary btn-loading-edit" type="button" style="display: none;" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Memproses...
                </button>
            </div>
            </form>
        </div>
    </div>

    <!-- Delete BK Modal-->
    <div class="modal fade" id="deleteBKModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin ingin menghapus Bidang Keahlian?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="#">Delete</a>
                </div>
            </div>
        </div>
    </div>

    @endsection
