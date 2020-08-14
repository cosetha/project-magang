
@extends('layouts/adminLayout')
@section('title', 'Edit Password')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Password</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- edit form column -->
        <div class="col-md-9 personal-info">

            <form class="form-horizontal form-edit-password" role="form">
                <div class="form-group">
                    <label class="col-md-3 control-label">Password lama:</label>
                    <div class="col-md-8">

                      <input class="form-control" type="password" id="password-lama" placeholder="masukkan password lama">
                    </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Password:</label>
                    <div class="col-md-8">
                      <input class="form-control" type="password" id="password" placeholder="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Confirm password:</label>
                    <div class="col-md-8">
                      <input class="form-control" type="password" placeholder="password confirmation" id="password-confirm">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                      <input type="button" class="btn btn-primary" data-id="{{ auth()->user()->id }}" id="btn-edit-password" value="Save Changes">
                      <span></span>
                      <a href="{{url('dashboard')}}" class="btn btn-default">Cancels</a>
                    </div>
                  </div>
                </form>
              </div>
          </div>
        </div>
    </div>
  </div>
    <!-- End of Main Content -->

    @endsection



    <script>
        function readURL(input, id) {
            id = id || '#file-image';
            if (input.files &amp;&amp; input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(id).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
                $('#file-image').removeClass('hidden');
                $('#start').hide();
            }
        }
    </script>
