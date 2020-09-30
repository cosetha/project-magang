@extends('layouts/adminLayout')
@section('title', 'Dosen')

@section('content')

<script type="text/javascript">
    document.getElementById('profile').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dosen</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Dosen</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <button class="btn btn-primary ml-2 btn-add-dosen">+ Add Dosen</button>&nbsp;<button data-toggle="modal" data-target="#importExcel" type="button" class="btn btn-dark"><i class="fas fa-file-import"></i> Import</button>&nbsp;<button id="btn-export-dosen" type="button" class="btn btn-dark"><i class="fas fa-file-export"></i> Export</button>
        </div>
        <div class="card-body">
            <div id="datatable-dosen"></div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->


<!-- Add Dosen Modal-->
<div class="modal fade" id="DosenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Dosen</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="FormTambahDosen">
                    @csrf
                    <input type="hidden" name="token" value="{{ csrf_token() }}">
                    <label for="namadosen">Nama Dosen</label>
                    <input type="text" class="form-control" id="nama" name="nama">

                    <label for="nik">NIK</label>
                    <input type="text" maxlength="15" class="form-control" id="nik" name="nik">

                    <label for="nidn">NIDN</label>
                    <input type="text" maxlength="15" class="form-control" id="nidn" name="nidn">

                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>

                    <div class="form-group mt-3">
                        <label for="file">Gambar</label>
                        <input id="file" type="file" name="gambar" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary btn-submit-dosen">Submit</button>
                <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Memproses...
                </button>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- Show Dosen Modal-->
<div class="modal fade" id="ShowDosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Dosen</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                    <label for="namadosen">Nama Dosen</label>
                    <input type="text" class="form-control" id="show-nama" name="nama" disabled>

                    <label for="nik">NIK</label>
                    <input type="text" maxlength="15" class="form-control" id="nik-show" name="nik" disabled>

                    <label for="nidn">NIDN</label>
                    <input type="text" maxlength="15" class="form-control" id="nidn-show" name="nidn" disabled>

                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea class="form-control" id="show-deskripsi" name="show-deskripsi" disabled></textarea>


            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>


<!-- Edit Dosen Modal-->
<div class="modal fade" id="editDosenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit dosen</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="FormEditDosen">
                    @csrf
                    <input type="hidden" id="id-dosen" value="">
                    <input type="hidden" name="token" value="{{ csrf_token() }}">
                    <label for="edit-nama-dosen">Nama Dosen</label>
                    <input type="text" class="form-control" id="edit-nama-dosen" name="edit_nama">

                    <label for="nik">NIK</label>
                    <input type="text" maxlength="15" class="form-control" id="nik-edit" name="nik">

                    <label for="nidn">NIDN</label>
                    <input type="text" maxlength="15" class="form-control" id="nidn-edit" name="nidn">

                    <label for="edit_deskripsi" class="mt-2">Deskripsi</label>
                    <textarea class="form-control" id="edit_deskripsi" name="edit_deskripsi"> </textarea>

                    <div class="form-group mt-3">
                        <label for="file-upload">Gambar</label>
                        <input input id="file-upload" type="file" name="gambar" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>



            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary btn-save">Save</button>
                <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Memproses...
                </button>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- Export Dosen Modal-->
<div class="modal fade" id="ExportDosenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Export</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih Format Laporan untuk di Export</div>
            <div class="modal-footer">
                <a href="/dosen/export-excel" class="btn btn-outline-success"><i class="fas fa-file-excel"></i> Excel</a>
                <a href="/dosen/export-pdf" class="btn btn-outline-danger"><i class="fas fa-file-pdf"></i> PDF</a>
            </div>
        </div>
    </div>
</div>

<!-- Import Dosen Modal -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" id="FormExcelDosen" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                            <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
						</div>
						<div class="modal-body">

							@csrf

							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" id="file-excel" name="file" required="required" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                            </div>
                            <input type="hidden" name="token" value="{{ csrf_token() }}">

						</div>
						<div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-import"><i class="fas fa-file-import"></i> Import</button>
                            <a href="/download-format-excel-dosen" class="btn btn-success btn-download"><i class="fas fa-file-download"></i> Download Format</a>
                            <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Memproses...
                            </button>
						</div>
					</div>
				</form>
			</div>
		</div>
@endsection

@section('js-ajax')
      <script src="{{ asset('js/Profile/Dosen.js') }}"></script>
@endsection
