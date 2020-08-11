@extends('layouts/adminLayout')
@section('title', 'Kerja Sama')

@section('content')

<script type="text/javascript">
    document.getElementById('home').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kerja Sama</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>


    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Kerja Sama</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#KerjasamaModal" data-backdrop="static" data-keyboard="false">+
                Add Kerja Sama</a>
            </div>


            <div class="card-body">
            <div class="table-responsive">
                <div id="datatable-kerjasama"></div>
              </div>
            </div>
        </div>
    </div>
</div>
    <!-- End of Main Content -->


    <!-- Add Kerja Sama Modal-->
    <div class="modal fade" id="KerjasamaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kerja Sama</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form accept-charset="utf-8" enctype="multipart/form-data" method="post"  id="form-kerjasama">
                        @csrf

                        <label for="perusahaan">Perusahaan</label>
                        <input type="text" class="form-control" id="perusahaan" name="perusahaan" required>

                        <label for="caption" class="mt-2">Caption</label>
                        <input type="text" class="form-control" id="caption" name="caption" required>

                        <label for="link" class="mt-2">Link</label>
                        <input type="text" class="form-control" id="link" name="link" required>

                        <div class="form-group mt-3">
                            <label for="file">Logo</label>
                            <input input id="gambar" type="file" name="gambar" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                                <script>
                                function readURL(input) {
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
                    <button type="submit" class="btn btn-primary" id="btn-submit-kerjasama">Submit</button>
                    <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                     <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                </div>
                    </form>
            </div>
        </div>
    </div>


    <!-- Edit Kerja Sama Modal-->
    <div class="modal fade" id="editKerjasamaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kerja Sama</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-kerjasama-edit">
                        @csrf

                        <label for="perusahaan">Perusahaan</label>
                        <input type="text" class="form-control" id="perusahaan-edit" name="perusahaan-edit" required>

                        <label for="caption" class="mt-2">Caption</label>
                        <input type="text" class="form-control" id="caption-edit" name="caption-edit" required>

                        <label for="link" class="mt-2">Link</label>
                        <input type="text" class="form-control" id="link-edit" name="link-edit" required>

                        <div class="form-group mt-3">
                            <label for="file">Logo</label>
                            <input input id="gambar-edit" type="file" name="gambar-edit" accept="image/*" onchange="readURLI(this);" aria-describedby="inputGroupFileAddon01">
                                <script>
                                function readURLI(input) {
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
                    <button type="submit" class="btn btn-primary" id="btn-save-kerjasama">Save</button>
                    <button class="btn btn-primary btn-loading-edit" type="button" style="display: none;" disabled>
                     <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                </div>
                    </form>
            </div>
        </div>
    </div>

    <!-- Delete Kerja Sama Modal-->
    

    @endsection
