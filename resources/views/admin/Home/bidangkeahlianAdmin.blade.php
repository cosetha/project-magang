@extends('layouts/adminLayout')
@section('title', 'Bidang Keahlian')

@section('content')

<script type="text/javascript">
  document.getElementById('home').classList.add('active');
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
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#BKModal">+
                  Add Bidang Keahlian</a>
          </div>
        

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode Bidang Keahlian</th>
                      <th>Nama Bidang Keahlian</th>
                      <th>Deskripsi</th>
                      <th>Kode Jadwal</th>
                      <th>Akreditasi</th>
                      <th>Gambar</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>System Architect</td>
                      <td>1</td>
                      <td>2</td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#editBKModal" class="badge badge-success">Edit</a>
                        <a href="#" data-toggle="modal" data-target="#deleteBKModal" class="badge badge-danger">Delete</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
       </div>
      <!-- End of Main Content -->


      <!-- Add Sosmed Modal-->
      <div class="modal fade" id="BKModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Bidang Keahlian</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">


            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="">
            @csrf

                    <label for="namaBK">Nama Bidang Keahlian</label>
                    <input type="text" class="form-control" id="" name="">
                    
                    <label for="namaBK">Nama Bidang Keahlian</label>
                    <input type="text" class="form-control" id="" name="">

                    
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" id="" name="">

                    <label for="idjadwal">Id Jadwal</label>
                    <input type="text" class="form-control" id="" name="">

                    
                    <label for="kodejadwal">Kode Jadwal</label>
                    <input type="text" class="form-control" id="" name="">

                    
                    <label for="Akreditasi">Akreditasi</label>
                    <input type="text" class="form-control" id="" name="">

                    <div class="form-group mt-3">
                        <label for="file">Gambar</label>
                        <input input id="file-upload" type="file" name="gambar" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>
            

            </form>

            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="#">Submit</a>
            </div>
          </div>
        </div>
      </div>


      <!-- Edit Sosmed Modal-->
      <div class="modal fade" id="editBKModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Bidang Keahlian</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">


            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="">
            @csrf

            <label for="namaBK">Nama Bidang Keahlian</label>
                    <input type="text" class="form-control" id="" name="">
                    
                    <label for="namaBK">Nama Bidang Keahlian</label>
                    <input type="text" class="form-control" id="" name="">

                    
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" id="" name="">

                    <label for="idjadwal">Id Jadwal</label>
                    <input type="text" class="form-control" id="" name="">

                    
                    <label for="kodejadwal">Kode Jadwal</label>
                    <input type="text" class="form-control" id="" name="">

                    
                    <label for="Akreditasi">Akreditasi</label>
                    <input type="text" class="form-control" id="" name="">

                    <div class="form-group mt-3">
                        <label for="file">Gambar</label>
                        <input input id="file-upload" type="file" name="gambar" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>
            

            </form>

            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="#">Submit</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Delete Sosmed Modal-->
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
