@extends('layouts.adminLayout')
@section('title', 'Akreditasi')

@section('content')

<script type="text/javascript">
    document.getElementById('akademik').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Akreditasi</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Akreditasi</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#AkreditasiModal">+ Add Akreditasi</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
               <div id="datatable-akreditasi"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->

<!-- Add Akreditasi Modal-->
<div class="modal fade" id="AkreditasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akreditasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-akreditasi">
                <div class="modal-body">
                @csrf

                    <!-- <label for="lembaga">Nama Lembaga</label>
                    <input type="text" class="form-control" id="lembaga" name="lembaga" required> -->

                    <div class="form-group">
                    <label for="nilai" class="mt-2">Nilai Akreditasi</label>
                      <select class="form-control" id="nilai" name="nilai">
                          <option value="" hidden> -- Pilih Nilai Akreditasi -- </option>
                          @foreach($data as $n)
                            <option value="{{$n['value']}}">{{$n['alt']}}</option>
                          @endforeach
                      </select>
                    </div>

                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">

                    <label for="tanggal_selesai">Tanggal Akhir</label>
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">

                    <div class="form-group mt-3">
                        <label for="file">Upload Sertifikat Akreditas</label>
                        <input id="file-upload" type="file" name="file" accept="image/*">
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btn-submit-akreditasi">Save</button>
                    <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Akreditasi Modal-->
<div class="modal fade" id="editAkreditasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-akreditasi" id="exampleModalLabel">Edit Akreditasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-akreditasi-edit">
                <div class="modal-body">
                @csrf

                    <input type="hidden" name="id-edit" id="id-edit">

                    <div class="form-group">
                    <label for="nilai-edit" class="mt-2">Nilai Akreditasi</label>
                      <select class="form-control" id="nilai-edit" name="nilai-edit">
                        @foreach($data as $n)
                            <option value="{{$n['value']}}">{{$n['alt']}}</option>
                        @endforeach
                      </select>
                    </div>

                    <label for="tanggal_mulai-edit">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tanggal_mulai-edit" name="tanggal_mulai-edit">

                    <label for="tanggal_selesai-edit">Tanggal Akhir</label>
                    <input type="date" class="form-control" id="tanggal_selesai-edit" name="tanggal_selesai-edit">

                    <div class="form-group mt-3">
                        <label for="file-upload-edit">Upload Sertifikat Akreditas</label>
                        <input id="file-upload-edit" type="file" name="file" accept="image/*">
                    </div>

                </div>
                <div class="modal-footer">
                <button class="btn btn-secondary btn-close-edit" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btn-save-akreditasi">Save</button>
                    <button class="btn btn-primary btn-loading-edit" type="button" style="display: none;" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                    <button type="button" class="btn btn-success btn-aktifkan-akreditasi" style="display: none">Aktifkan</button>
                    <button type="button" class="btn btn-warning btn-nonaktifkan-akreditasi" style="display: none">Non-Aktifkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('js-ajax')
<script src="{{ asset('js/Akademik/Akreditasi.js') }}"></script>
@endsection
