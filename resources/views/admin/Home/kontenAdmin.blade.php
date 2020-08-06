@extends('layouts/adminLayout')
@section('title', 'Konten')

@section('content')

<script type="text/javascript">
    document.getElementById('home').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Konten</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>


    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Konten</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#KontenModal" data-backdrop="static" data-keyboard="false">+
                Add Konten</a>
            </div>
            <div class="table-responsive">
            <div class="card-body">
                <div id="datatable-konten"></div>
            </div>
            </div>
        </div>
    </div>
</div>
        <!-- End of Main Content -->


        <!-- Add Konten Modal-->
        <div class="modal fade" id="KontenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="KontenModalTitle">Tambah Konten</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-konten">
                            @csrf
                            <label for="judulKonten">Judul Konten</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                            <label for="caption" class="mt-2">Deskripsi</label>
                            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"> </textarea>
                            <div class="form-group">
                            <label for="menu" class="mt-2">Menu</label>
                            <select name="menu" id="menu" class="form-control">
                            @foreach($menus as $menu)
                                   <option value="{{$menu}}">{{$menu}}</option>
                             @endforeach
                            </select>
                            </div>
                            <div class="form-group mt-3">
                                <input type="hidden" name="token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value=""/>
                            </div>
                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btn-submit-konten">Submit</button>
                    <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="KontenModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="KontenModalTitle">Edit Konten</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="form-konten-edit">
                            @csrf
                            <label for="judulKonten">Judul Konten</label>
                            <input type="text" class="form-control" id="judul-edit" name="judul-edit" required>
                            <label for="caption" class="mt-2">Deskripsi</label>
                            <textarea type="text" class="form-control" id="deskripsi-edit" name="deskripsi-edit"> </textarea>
                            <label for="menu-edit" class="mt-2">Menu</label>
                            <div class="form-group">
                            <select class="form-control" id="menu-edit" name="menu-edit">
                            @foreach($menus as $menu)
                                   <option value="{{$menu}}">{{$menu}}</option>
                             @endforeach
                            </select>
                            </div>
                            <div class="form-group mt-3">
                                <input type="hidden" name="token" value="{{ csrf_token() }}">
                                <input type="hidden" name="edit-id" value=""/>
                            </div>
                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-secondary btn-close-edit" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btn-save-konten">Save</button>
                    <button class="btn btn-primary btn-loading-edit" type="button" style="display: none;" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>   
        
        @endsection
