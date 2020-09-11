@extends('layouts/adminLayout')
@section('title', 'History')

@section('content')

<script type="text/javascript">
    document.getElementById('footer').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">History</h1>
    </div>


    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables History</h6>
        </div>

        <!-- <div class="d-sm-flex align-items-center m-3">
            <button type="button" class="btn btn-primary ml-2" id="btn-modal-blog">+ Add Blog</button>
        </div> -->

        <div class="card-body">
            <div id="datatable-history"></div>
        </div>
    </div>
</div>
<!-- End of Main Content -->




@endsection

@section('js-ajax')
      <script src="{{ asset('js/history.js') }}"></script>
@endsection
