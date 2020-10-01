@extends('layouts/adminLayout')
@section('title', 'Pengumuman')

@section('content')

<script type="text/javascript">
  document.getElementById('home').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pengumuman</h1>
  </div>

  <!-- Content Row -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Pengumuman</h6>
    </div>

    <div class="d-sm-flex align-items-center m-3">
      <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#PengumumanModal">+ Add Pengumuman</a>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <div id="datatable-pengumuman"></div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->

<!-- Add Pengumuman Modal-->
<div class="modal fade" id="PengumumanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengumuman</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

      <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-tambah-pengumuman">
      @csrf
        <label for="pengumuman">Pengumuman</label>
        <input type="text" class="form-control" id="" name="judul">


        <label for="deskripsi" class="mt-2">Deskripsi</label>
        <textarea type="text" class="form-control" id="deskripsi-tambah" name="deskripsi-tambah"> </textarea>

        <div class="form-group mt-3">
            <label for="lampiran">Lampiran</label>
            <input input id="file-upload" type="file" name="file" accept="file/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal" id="close-modal-tambah">Cancel</button>
        <button class="btn btn-primary" type="button" id="btn-tambah-pengumuman">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Pengumuman Modal-->
<div class="modal fade" id="editPengumumanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pengumuman</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-edit-pengumuman">
      <div class="modal-body">
      @csrf

          <label for="pengumuman">Pengumuman</label>
          <input type="text" class="form-control" id="edit-judul" name="edit-judul">
          <label for="deskripsi" class="mt-2">Deskripsi</label>
          <textarea type="text" class="form-control" id="edit-deskripsi" name=""> </textarea>
          <div class="form-group mt-3">
              <label for="file">View Lampiran</label>
              <br>
              <a href="" id="lampiran"></a>
          </div>
          <div class="form-group mt-3">
              <label for="file">Lampiran</label>
              <input id="file-upload-edit" type="file" name="file" accept="file/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
          </div>
          <input type="hidden" name="edit-id" value="">

      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" id="btn-edit-pengumuman" type="submit">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete Sosmed Modal-->
<div class="modal fade" id="deletePengumumanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Apakah anda yakin ingin menghapus pengumuman?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- show pengumuman modal -->
<div class="modal fade" id="showPengumumanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pengumuman</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <form accept-charset="utf-8" enctype="multipart/form-data" method="post">
      <div class="modal-body">
      @csrf
        <label for="pengumuman">Pengumuman</label>
        <input type="text" class="form-control" id="show-judul" disabled>

        <label for="deskripsi" class="mt-2">Deskripsi</label>
        <textarea type="text" class="form-control" id="show-deskripsi"> </textarea>

        <label for="deskripsi" class="mt-2">Lampiran</label>
        <br>
        <a href=""  id="file-pengumuman"></a>

      </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('js-ajax')
<script src="{{ asset('js/Home/pengumuman.js') }}"></script>
@endsection
