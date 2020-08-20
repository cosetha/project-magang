@extends('layouts/adminLayout')
@section('title', 'Dosen dan Tenaga Kerja')

@section('content')

<script type="text/javascript">
    document.getElementById('profile').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tenaga Kerja</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>


    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Tenaga Kerja</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" id="btn-tambah-tk">+ Add Tenaga Kerja</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div id="datatable-tenaga"></div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- End of Main Content -->


<!-- Add Tenaga Kerja Modal-->
<div class="modal fade" id="TenagaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tenaga Kerja</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-tambah-tk">
                    @csrf

                    <label for="namatenaga">Nama Tenaga Kerja</label>
                    <input type="text" class="form-control" id="" name="nama">

                    <label for="alamat" class="mt-2">Alamat</label>
                    <input type="text" class="form-control" id="" name="alamat">

                    <label for="Telepon" class="mt-2">Telepon</label>
                    <input type="text" class="form-control" id="" name="telepon">

                    <div class="form-group">
                        <label for="jabatan" class="mt-2">Jabatan</label>
                        <select class="form-control" id="jabatan" name="">

                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="file">Gambar</label>
                        <input input id="file-upload" type="file" name="gambar" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>


<!-- Edit Tenaga Kerja Modal-->
<div class="modal fade" id="editTenagaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Tenaga Kerja</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-edit-tk">
                    @csrf

                    <label for="namatenaga">Nama Tenaga Kerja</label>
                    <input type="text" class="form-control" id="nama-edit" name="nama-edit">

                    <label for="alamat" class="mt-2">Alamat</label>
                    <input type="text" class="form-control" id="alamat-edit" name="alamat-edit">

                    <label for="Telepon" class="mt-2">Telepon</label>
                    <input type="text" class="form-control" id="telp-edit" name="telp-edit">
                    <input type="hidden" name="edit-id" value="">

                    <div class="form-group">
                        <label for="jabatan" class="mt-2">Jabatan</label>
                        <select class="form-control" id="jabatan-edit" name="">
                            <option value="" hidden> -- Pilih Jabatan -- </option>

                            <option value=""></option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                      <img id="image-edit-tenaga" src="" alt="">
                    </div>

                    <div class="form-group mt-3">
                        <label for="file">Gambar</label>
                        <input input id="file-upload-edit" type="file" name="gambar" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" name="submit" value="Submit">
                    </div>


                </form>

            </div>

        </div>
    </div>
</div>

<!-- Delete Tenaga Kerja Modal-->
<div class="modal fade" id="deleteTenagaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus data tenaga kerja?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" type="button" id="confirm-delete-tenaga">Delete</button>
                <input type="hidden" name="hapus-id" value="">
            </div>
        </div>
    </div>
</div>


@endsection
@section('js-ajax')
  <script src="{{ asset('js/Profile/tenagaKerja.js') }}"></script>
@endsection
