@extends('layouts/adminLayout')
@section('title', 'Jadwal Kuliah')

@section('content')

<script type="text/javascript">
    document.getElementById('akademik').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jadwal Kuliah</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Jadwal</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#JadwalModal">+ Add Jadwal Kuliah</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th> {{--Tolong buatkan script buat auto numbering--}}
                            <th>Nama Jadwal</th>
                            <th>Semester</th>
                            <th>Bidang Keahlian</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="1%" align="center">1</td> {{--Tolong buatkan script buat auto numbering--}}
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>TI Software</td>
                            <td>3</td>
                            <td align="center">
                                <a href="#" data-toggle="modal" data-target="#editJadwalModal" style="font-size: 19pt; text-decoration: none;" class="mr-3">
                                    <i class="fas fa-pen-square"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#deleteJadwalModal" style="font-size: 18pt; text-decoration: none; color:red;">
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


<!-- Add Jadwal Modal-->
<div class="modal fade" id="JadwalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Kuliah</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="">
                    @csrf

                    <label for="namajadwal" class="mt-2">Nama Jadwal</label>
                    <input type="text" class="form-control" id="" name="">

                    <label for="semester" class="mt-2">Semester</label>
                    <input type="text" class="form-control" id="" name="">

                    <div class="form-group">
                        <label for="bidang-keahlian" class="mt-2">Bidang Keahlian</label>
                        <select class="form-control" id="" name="">
                            <option value="" hidden> -- Pilih Bidang Keahlian -- </option>
                            <option value="Teknologi Informasi">Teknologi Informasi</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Film dan Televisi">Film dan Televisi</option>
                            <option value="Bisnis Digital dan E-Commerce">Bisnis Digital dan E-Commerce</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="file">File</label>
                        <input input id="file-upload" type="file" name="pdf" accept="application/pdf" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
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
<div class="modal fade" id="editJadwalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit jadwal</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="">
                    @csrf

                    <label for="namajadwal" class="mt-2">Nama Jadwal</label>
                    <input type="text" class="form-control" id="" name="">

                    <label for="semester" class="mt-2">Semester</label>
                    <input type="text" class="form-control" id="" name="">

                    <div class="form-group">
                        <label for="bidang-keahlian" class="mt-2">Bidang Keahlian</label>
                        <select class="form-control" id="" name="">
                            <option value="" hidden> -- Pilih Bidang Keahlian -- </option>
                            <option value="Juara 1">Juara 1</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Film dan Televisi">Film dan Televisi</option>
                            <option value="Bisnis Digital dan E-Commerce">Bisnis Digital dan E-Commerce</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="file">File</label>
                        <input input id="file-upload" type="file" name="pdf" accept="application/pdf" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
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
<div class="modal fade" id="deleteJadwalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus data jadwal kuliah?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

@endsection
