@extends('layouts/adminLayout')
@section('title', 'Data Alumni')

@section('content')

<script type="text/javascript">
    document.getElementById('kemahasiswaan').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Alumni</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Alumni</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#AlumniModal">+ Add Data Alumni</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th> {{--Tolong buatkan script buat auto numbering--}}
                            <th>Nama Alumni</th>
                            <th>NIM</th>
                            <th>Bidang Keahlian</th>
                            <th>Angkatan</th>
                            <th>Lulus</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="1%" align="center">1</td> {{--Tolong buatkan script buat auto numbering--}}
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>System Architect</td>
                            <td>1</td>
                            <td>2</td>
                            <td align="center">
                                <a href="#" data-toggle="modal" data-target="#editAlumniModal" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                                    <i class="fas fa-pen-square"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#deleteAlumniModal" style="font-size: 18pt; text-decoration: none; color:red;">
                                    <i class="fas fa-trash"></i>
                                </a>
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


<!-- Add Alumni Modal-->
<div class="modal fade" id="AlumniModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Alumni</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="">
                    @csrf

                    <label for="namaalumni">Nama Alumni</label>
                    <input type="text" class="form-control" id="" name="">

                    <label for="NIMalumni" class="mt-2">NIM Alumni</label>
                    <input type="text" class="form-control" id="" name="">

                    <div class="form-group">
                        <label for="bk" class="mt-2">Bidang Keahlian</label>
                        <select class="form-control" id="" name="">
                            <option value="" hidden> -- Pilih Bidang Keahlian -- </option>

                            <option value=""></option>
                        </select>
                    </div>

                    <label for="angkatan" class="mt-2">Angkatan</label>
                    <input type="date" class="form-control" id="" name="">

                    <label for="lulus" class="mt-2">Lulus</label>
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


<!-- Edit Alumni Modal-->
<div class="modal fade" id="editAlumniModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Alumni</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="">
                    @csrf

                    <label for="namaalumni">Nama Alumni</label>
                    <input type="text" class="form-control" id="" name="">

                    <label for="NIMalumni" class="mt-2">NIM Alumni</label>
                    <input type="text" class="form-control" id="" name="">

                    <div class="form-group">
                        <label for="bk" class="mt-2">Bidang Keahlian</label>
                        <select class="form-control" id="" name="">
                            <option value="" hidden> -- Pilih Bidang Keahlian -- </option>

                            <option value=""></option>
                        </select>
                    </div>

                    <label for="angkatan" class="mt-2">Angkatan</label>
                    <input type="date" class="form-control" id="" name="">

                    <label for="lulus" class="mt-2">Lulus</label>
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

<!-- Delete Alumni Modal-->
<div class="modal fade" id="deleteAlumniModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus data alumni?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

@endsection
