@extends('layouts/adminLayout')
@section('title', 'Lowongan')

@section('content')

<script type="text/javascript">
    document.getElementById('kemahasiswaan').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lowongan</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Lowongan</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#LowonganModal">+ Add Lowongan</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
               <div id="datatable-lowongan"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->


<!-- Add Lowongan Modal-->
<div class="modal fade" id="LowonganModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah lowongan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-lowongan">
                    @csrf

                    <label for="namalowongan">Nama lowongan</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>

                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"> </textarea>

                    <div class="form-group">
                    <label for="jenis" class="mt-2">Jenis Lowongan</label>
                      <select class="form-control" id="jenis" name="jenis">
                          <option value="" hidden> -- Pilih Jenis Lowongan -- </option>
                          @foreach($data as $b)
                            <option value="{{$b['value']}}">{{$b['alt']}}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="file">Gambar</label>
                        <input input id="file-upload" type="file" name="gambar" accept="image/*" onchange="readURLa(this);" aria-describedby="inputGroupFileAddon01" required>

                    </div>
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
            <div class="modal-footer">
            <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="btn-submit-lowongan">Save</button>
                <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Memproses...
                </button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Lowongan Modal-->
<div class="modal fade" id="editLowonganModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-lowongan" id="exampleModalLabel">Edit lowongan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-lowongan-edit">
                    @csrf

                    <label for="namalowongan">Nama lowongan</label>
                    <input type="text" class="form-control" id="nama-edit" name="nama-edit" required>

                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi-edit" name="deskripsi-edit"> </textarea>

                    <div class="form-group">
                    <label for="jenis" class="mt-2">Jenis Lowongan</label>
                      <select class="form-control" id="lowongan-edit" name="lowongan-edit">
                        @foreach($data as $b)
                            <option value="{{$b['value']}}">{{$b['alt']}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="file">Gambar</label>
                        <input input id="file-upload-edit" type="file" name="gambar" accept="image/*" onchange="readURLn(this);" aria-describedby="inputGroupFileAddon01" >
                    </div>
                    <script>
                                function readURLn(input) {
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
                            <input type="hidden" name="id-edit" id="id-edit">
                

            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary btn-close-edit" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="btn-save-lowongan">Save</button>
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
<script src="{{ asset('js/Kemahasiswaan/Lowongan.js') }}"></script>
@endsection