@extends('layouts/adminLayout')
@section('title', 'Headline')

@section('content')

<script type="text/javascript">
    document.getElementById('home').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">HeadLine</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables HeadLine</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#HeadlineModal" data-backdrop="static" data-keyboard="false">+
                Add HeadLine</a>
            </div>
            <div class="table-responsive">
            <div class="card-body">
                <div id="datatable-headline"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<!-- Add Headline Modal-->
<div class="modal fade" id="HeadlineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="HeadlineModalTitle">Tambah Headline</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-headline">
                    @csrf

                    <label for="judulHeadline">Judul Headline</label>
                    <input type="text" class="form-control" id="judul" name="judul" >
                    <label for="caption" class="mt-2">Caption</label>
                    <input type="text" class="form-control" id="caption" name="caption" >

                    <div class="form-group mt-3">
                        <label for="gambar">Gambar</label>
                        <input input id="gambar" type="file" name="gambar" accept="image/*" onchange="readURLa(this);" aria-describedby="inputGroupFileAddon01">
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
                        <input type="hidden" name="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value=""/>
                        <label for="blah"></label>
                        <img id="blah" class = "rounded mx-auto d-block" height="200px" src="#" alt="your image" />
                    </div>
            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" id="btn-submit-headline">Submit</button>
            <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Memproses...
            </button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="HeadlineModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="HeadlineModalTitle">Edit Headline</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-headline-edit">
                    @csrf

                    <label for="judulHeadline">Judul Headline</label>
                    <input type="text" class="form-control" id="edit-judul" name="edit-judul" >
                    <label for="caption" class="mt-2">Caption</label>
                    <input type="text" class="form-control" id="edit-caption" name="edit-caption" >

                    <div class="form-group mt-3">
                        <label for="gambar">Gambar</label>
                        <input input id="edit-gambar" type="file" name="edit-gambar" accept="image/*" onchange="readURLe(this);" aria-describedby="inputGroupFileAddon01">
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
                        <input type="hidden" name="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="edit-id" value=""/>
                        <label for="blah"></label>
                        <img id="blah-edit" class = "rounded mx-auto d-block" height="200px" src="#" alt="your image" />
                    </div>
            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary btn-close-edit" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" id="btn-save-headline">Save</button>
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
