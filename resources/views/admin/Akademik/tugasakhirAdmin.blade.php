@extends('layouts/adminLayout')
@section('title', 'Tugas Akhir')

@section('content')

<script type="text/javascript">
  document.getElementById('akademik').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tugas Akhir</h1>
  </div>

  <!-- Content Row -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Tugas Akhir</h6>
    </div>

    <div class="d-sm-flex align-items-center m-3">
        <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#TaModal">+ Add Tugas Akhir</a>
    </div>

    <div class="card-body">
        <div id="datatable-ta"></div>
    </div>

  </div>
</div>
</div>
<!-- End of Main Content -->

<!-- Add ta Modal-->
<div class="modal fade" id="TaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Tugas Akhir</h5>
        <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

      <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="FormTambahTA">
      @csrf

        <label for="judulta">Judul Tugas Akhir</label>
        <input type="text" class="form-control" id="judul" name="judul">

        <label for="deskripsi" class="mt-2">Deskripsi</label>
        <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"> </textarea>

      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary btn-submit-to">Submit</button>
        <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Memproses...
          </button>
      </div>

      </form>
    </div>
  </div>
</div>

<!-- Edit ta Modal-->
<div class="modal fade" id="editTaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Tugas Akhir</h5>
        <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

      <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="FormEditTA">
      @csrf
              <input type="hidden" id="id-ta" val="">
              <label for="judulta">Judul Tugas Akhir</label>
              <input type="text" class="form-control" id="edit_judul" name="edit_judul">

              <label for="deskripsi" class="mt-2">Deskripsi</label>
              <textarea type="text" class="form-control" id="edit_deskripsi" name="edit_deskripsi"> </textarea>

      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary btn-save-ta">Save</button>
        <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Memproses...
          </button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Show ta Modal-->
<div class="modal fade" id="showTaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Tugas Akhir</h5>
        <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

      <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="FormShowTA">
      @csrf

        <label for="judulta">Judul Tugas Akhir</label>
        <input type="text" class="form-control" id="show_judul" readonly>

        <label for="deskripsi" class="mt-2">Deskripsi</label>
        <textarea type="text" class="form-control" id="show_deskripsi" name="show_deskripsi"> </textarea>

      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete ta Modal-->
<div class="modal fade" id="deleteTaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Apakah anda yakin ingin menghapus data Tugas Akhir?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js-ajax')
  <script src="{{ asset('js/Akademik/TugasAkhir.js') }}"></script>
@endsection
