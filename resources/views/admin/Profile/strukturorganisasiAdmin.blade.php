@extends('layouts/adminLayout')
@section('title', 'Struktur Organisasi')

@section('content')

<script type="text/javascript">
    document.getElementById('profile').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Struktur Organisasi</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>


    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Struktur Organisasi</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <button type="button" class="btn btn-primary ml-2" id="btn-modal-so">+
                Add Struktur Organisasi</button>
            </div>


            <div class="card-body">
                <div id="datatable-struktur-organisasi"></div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->


<!-- Add Sosmed Modal-->
<div class="modal fade" id="StrukturorganisasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Struktur Organisasi</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" id="FormAddSO" enctype="multipart/form-data" method="post">
                    @csrf

                    <label for="namastrukturorganisasi">Nama Struktur Organisasi</label>
                    <input type="text" class="form-control" id="nama-struktur-organisasi" name="nama">


                    <label for="Deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"> </textarea>

                    <div class="form-group mt-3">
                        <label for="file">Logo</label>
                        <input input id="file-upload" type="file" name="gambar" accept="image/png"  aria-describedby="inputGroupFileAddon01">
                    </div>
                    <input type="hidden" name="token" value="{{ csrf_token() }}">


            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="btn-submit-so">Submit</button>
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
<div class="modal fade" id="editStrukturorganisasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulso"></h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="FormEditSO">
                    @csrf
                    <input type="hidden" value="" id="id-so">
                    <input type="hidden" name="token" value="{{ csrf_token() }}">
                    <label for="edit-nama-so">Nama Struktur Organisasi</label>
                    <input type="text" class="form-control" id="edit-nama-so" name="nama">


                    <label for="edit-deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="text" class="form-control" id="edit-deskripsi" name="edit-deskripsi"> </textarea>

                    <div class="form-group mt-3">
                        <label for="file">Logo</label>
                        <input input id="file-upload-edit" type="file" name="gambar" accept="image/png"  aria-describedby="inputGroupFileAddon01">
                    </div>
                    <img id="blah" class = "rounded mx-auto d-block" height="200px" src="" alt=""" />

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary btn-save-so">Save</button>
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
<div class="modal fade" id="deleteStrukturorganisasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus Struktur Organisasi?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js-ajax')
      <script src="{{ asset('js/profile/StrukturOrganisasi.js') }}"></script>
@endsection
