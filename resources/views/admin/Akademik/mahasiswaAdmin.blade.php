@extends('layouts/adminLayout')
@section('title', 'Akademik')

@section('content')

<script type="text/javascript">
  document.getElementById('akademik').classList.add('active');
</script>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Mahasiswa</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
          </div>

          <div class="d-sm-flex align-items-center m-4">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#mahasiswaModal">Add</a>
          </div>
          

          <!-- Content Row -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Mahasiswa</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nim</th>
                      <th>Nama</th>
                      <th>Bidang Keahlian</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nim</th>
                      <th>Nama</th>
                      <th>Bidang Keahlian</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#editMahasiswaModal" class="badge badge-success">Edit</a>
                        <a href="#" data-toggle="modal" data-target="#deleteMahasiswaModal" class="badge badge-danger">Delete</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
       </div>
      <!-- End of Main Content -->


      <!-- Add Sosmed Modal-->
      <div class="modal fade" id="mahasiswaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">


            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="">
            @csrf

                    <label for="nim">Nim</label>
                    <input type="text" class="form-control" id="" name="">

                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="" name="">

                    <div class="form-group">
                    <label for="bk">Bidang Keahlian</label>
                      <select class="form-control" id="" name="">
                          <option value="" hidden> -- Pilih Bidang Keahlian -- </option>
    
                              <option value=""></option>
                      </select>
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
      <div class="modal fade" id="editMahasiswaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">


            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="">
            @csrf

            <label for="nim">Nim</label>
                    <input type="text" class="form-control" id="" name="">

                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="" name="">

                    <div class="form-group">
                    <label for="bk">Bidang Keahlian</label>
                    <select class="form-control" id="" name="">
                        <option value="" hidden> -- Pilih Bidang Keahlian -- </option>
  
                            <option value=""></option>
                    </select>
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
      <div class="modal fade" id="deleteMahasiswaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus data?</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-danger" href="#">Delete</a>
            </div>
          </div>
        </div>
      </div>

      @endsection