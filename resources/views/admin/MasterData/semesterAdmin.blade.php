@extends('layouts/adminLayout')
@section('title', 'Semester')

@section('content')

<script type="text/javascript">
    document.getElementById('MasterData').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Semester</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>


    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Semester</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#SemesterModal">+
                Add Semester</a>
            </div>


            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th> {{--Tolong buatkan script buat auto numbering--}}
                                <th>Semester</th>
                                <th>Status</th>
                                <th>Action</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="1%" align="center">1</td> {{--Tolong buatkan script buat auto numbering--}}
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td align="center">
                                    <a href="#" data-toggle="modal" data-target="#editSemesterModal" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                                        <i class="fas fa-pen-square"></i>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#deleteSemesterModal" style="font-size: 18pt; text-decoration: none; color:red;">
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


<!-- Add Sosmed Modal-->
<div class="modal fade" id="SemesterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Semester</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="">
                    @csrf

                    <label for="judulSemester">Semester</label>
                    <input type="text" class="form-control" id="" name="">

                    <!-- Rounded switch -->
                    <label for="judulSemester" class="mt-3">Semester</label>
                    <input type="checkbox" data-toggle="toggle" data-width="100" data-on="Aktif" data-off="Tidak">
                        <script>
                        $(function() {
                            $('#toggle-two').bootstrapToggle({
                            on: 'Aktif',
                            off: 'Non-Aktif'
                            });
                        })
                        </script>

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
<div class="modal fade" id="editSemesterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Semester</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="">
                    @csrf

                    <label for="judulSemester">Semester</label>
                    <input type="text" class="form-control" id="" name="">

                    <!-- Rounded switch -->
                    <label for="judulSemester" class="mt-3">Semester</label>
                    <input type="checkbox" data-toggle="toggle" data-width="100" data-on="Aktif" data-off="Tidak">
                        <script>
                        $(function() {
                            $('#toggle-two').bootstrapToggle({
                            on: 'Aktif',
                            off: 'Non-Aktif'
                            });
                        })
                        </script>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="#">Submit</a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Sosmed Modal-->
<div class="modal fade" id="deleteSemesterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus data Semester?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

@endsection

