@extends('layouts/adminLayout')
@section('title', 'Dashboard')

@section('content')

<script type="text/javascript">
  document.getElementById('dashboard').classList.add('active');
</script>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sosmed</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
          </div>

          <div class="d-sm-flex align-items-center mb-4">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#sosmedModal">Add</a>
          </div>


          <!-- Content Row -->
          <div class="row">
                <table class="table">

                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Nama Web</th>
                    <th scope="col">Link</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>web</td>
                        <td>link</td>
                        <td>jenis</td>
                        <td>
                        <a href="#" class="badge badge-success">Edit</a>
                        <a href="#" class="badge badge-danger">Delete</a>
                  </td>

                </tbody>
                </table>
                </div>
          </div>
      </div>
      <!-- End of Main Content -->


      <!-- Add Sosmed Modal-->
      <div class="modal fade" id="sosmedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Sosmed</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">


            <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="">
            @csrf

                    <label for="namaweb">Nama Web</label>
                    <input type="text" class="form-control" id="" name="">

                    <label for="linkweb">Link Web</label>
                    <input type="text" class="form-control" id="" name="">

            </form>

            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="#">Submit</a>
            </div>
          </div>
        </div>
      </div>
      @endsection
