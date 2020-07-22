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
            <h1 class="h3 mb-0 text-gray-800">Kalender Akademik</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
          </div>

          <div class="d-sm-flex align-items-center mb-4">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#kalenderModal">Add</a>
          </div>
          

          <!-- Content Row -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Kalender</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Kegiatan</th>
                      <th>Semester</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selasai</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama Kegiatan</th>
                      <th>Semester</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selasai</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>1</td>
                      <td>2</td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#editkalenderModal" class="badge badge-success">Edit</a>
                        <a href="#" data-toggle="modal" data-target="#deletekalenderModal" class="badge badge-danger">Delete</a>
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
      <div class="modal fade" id="kalenderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">


            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="">
            @csrf

            <label for="namakegiatan">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="" name="">

                    <div class="form-group">
                    <label for="semester">Semester</label>
                      <select class="form-control" id="" name="">
                        <option value="" hidden> -- Pilih Semester -- </option>
  
                            <option value=""></option>
                      </select>
                   </div>

                    <label for="tanggalmulai">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="" name="">

                    <label for="tanggalselesai">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="" name="">
            
            

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
      <div class="modal fade" id="editkalenderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Kegiatan</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">


            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="">
            @csrf

                    <label for="namakalender">Nama kalender</label>
                    <input type="text" class="form-control" id="" name="">

                    <div class="form-group">
                    <label for="semester">Semester</label>
                    <select class="form-control" id="" name="">
                        <option value="" hidden> -- Pilih Semester -- </option>
  
                            <option value=""></option>
                    </select>
                </div>

                    <label for="tanggalmulai">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="" name="">

                    <label for="tanggalselesai">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="" name="">
            

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
      <div class="modal fade" id="deletekalenderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus Kegiatan?</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-danger" href="#">Delete</a>
            </div>
          </div>
        </div>
      </div>

      @endsection