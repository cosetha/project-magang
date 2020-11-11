@extends('layouts/adminLayout')
@section('title', 'Prestasi')

@section('content')

<script type="text/javascript">
  document.getElementById('profile').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Prestasi</h1>
  </div>

  <!-- Content Row -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Prestasi</h6>
    </div>

    <div class="d-sm-flex align-items-center m-3">
        <a class="btn btn-primary ml-2" href="#" data-toggle="modal" id="btn-tambah-prestasi">+ Add Prestasi</a>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <div id="datatable-prestasi"></div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->

<!-- Add Prestasi Modal-->
<div class="modal fade" id="PrestasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Prestasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

      <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-tambah-prestasi">
      @csrf

        <label for="namakejuaraaan">Nama Kejuaraaan</label>
        <input type="text" class="form-control" name="nama-kejuaraan">

        <label for="nama" class="mt-2">Nama Peserta</label>
        <input type="text" class="form-control" name="nama">

        <div class="form-group">
        <label for="peringkat" class="mt-2">Peringkat</label>
          <select class="form-control" id="peringkat" name="peringkat">
              <option value="" hidden> -- Pilih Peringkat -- </option>
                  <option value="Juara 1">Juara 1</option>
                  <option value="Juara 2">Juara 2</option>
                  <option value="Juara 3">Juara 3</option>
                  <option value="Juara Harapan 1">Juara Harapan 1</option>
                  <option value="Juara Harapan 2">Juara Harapan 2</option>
                  <option value="Juara Harapan 3">Juara Harapan 3</option>
          </select>
        </div>

        <label for="tahun" class="mt-2">Tahun</label>
        <input type="text" class="form-control years-picker" id="tahun" name="tahun" readonly>

        <div class="form-group">
        <label for="bk" class="mt-2">Bidang Keahlian</label>
          <select class="form-control bk" id="list-bk" name="">
              <option value="" hidden> -- Pilih Bidang Keahlian -- </option>
                  <!-- <option value="">ok</option> -->
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

<!-- Edit Prestasi Modal-->
<div class="modal fade" id="editPrestasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit prestasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

      <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-edit-prestasi">
      @csrf

        <label for="namakejuaraaan">Nama Kejuaraaan</label>
        <input type="text" class="form-control" id="nama-kejuaraan-edit" name="nama-kejuaraan-edit">

        <label for="nama">Nama Peserta</label>
        <input type="text" class="form-control" id="nama-edit" name="nama-edit">

        <div class="form-group">
        <label for="peringkat">Peringkat</label>
          <select class="form-control" id="peringkat-edit" name="">
              <option value="" hidden> -- Pilih Peringkat -- </option>
                  <option value="Juara 1">Juara 1</option>
                  <option value="Juara 2">Juara 2</option>
                  <option value="Juara 3">Juara 3</option>
                  <option value="Juara Harapan 1">Juara Harapan 1</option>
                  <option value="Juara Harapan 2">Juara Harapan 2</option>
                  <option value="Juara Harapan 3">Juara Harapan 3</option>
          </select>
        </div>

        <label for="tahun">Tahun</label>
        <input type="text" class="form-control years-picker" id="tahun-edit" name="tahun-edit">

        <div class="form-group">
        <label for="bk">Bidang Keahlian</label>
          <select class="form-control" id="bk-edit" name="">
              <option value="" hidden> -- Pilih Bidang Keahlian -- </option>

                  <option value=""></option>
          </select>
        </div>

        <div class="form-group mt-3">
          <img id="image-edit-prestasi" src="" alt="" style="width: 70%; height: 70%; border-radius: 10px;">
        </div>

        <div class="form-group mt-3">
            <label for="file">Gambar</label>
            <input input id="file-upload-edit" type="file" name="gambar" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input type="submit" class="btn btn-primary" name="submit" value="Submit">
          <input type="hidden" name="edit-id" value="">
        </div>

      </form>
      </div>
    </div>
  </div>
</div>

<!-- Delete Sosmed Modal-->
<div class="modal fade" id="deletePrestasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Apakah anda yakin ingin menghapus data prestasi?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-danger" type="button" id="btn-confirm-hapus">Delete</button>
        <input type="hidden" name="hapus-id" value="">
      </div>
    </div>
  </div>
</div>
@endsection

@section('js-ajax')
  <script src="{{ asset('js/datepicker.js') }}"></script>
  <script src="{{ asset('js/Profile/prestasi.js') }}"></script>
@endsection
