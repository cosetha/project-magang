
@extends('layouts/adminLayout')
@section('title', 'Edit Profile')

@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
          </div>

          <!-- Content Row -->
          <div class="row">
              
              <!-- edit form column -->
              <div class="col-md-9 personal-info">
                <div class="alert alert-info alert-dismissable">
                  <a class="panel-close close" data-dismiss="alert">×</a> 
                  <i class="fa fa-coffee"></i>
                  This is an <strong>.alert</strong>. Use this to show important messages to the user.
                </div>
                
                <form class="form-horizontal" role="form">


                  <div class="form-group row mt-2" >
                    <div class="col-sm-6 mb-3 mb-sm-2" sty>
                      <div class="text-center">
                       <img src="{{ asset('img/Login-image.png') }}" class="w-50 p-3">
                       <h6>Upload a different photo...</h6>
                       <div class="form-group" style="margin-left:80pt;"> 
                       <input input id="file-upload" type="file" name="gambar" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                      </div>
                     </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-md-3 control-label">Username:</label>
                      <div class="col-md-12">
                        <input class="form-control" type="text" value="janeuser">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Email:</label>
                      <div class="col-lg-12">
                        <input class="form-control" type="text" value="janesemail@gmail.com">
                      </div>
                    </div>
                    <div class="form-group" style="margin-top:65pt;">
                      <label class="col-md-3 control-label"></label>
                      <div class="col-md-12">
                        <input type="button" class="btn btn-primary" value="Save Changes">
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Cancel">
                      </div>
                    </div>
                    </div>
                  </div>


                </form>
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