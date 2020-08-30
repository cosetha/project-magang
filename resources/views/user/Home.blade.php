@extends('layouts.userlayout')
@section('title', 'Home')

@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="{{ asset('img/rog.jpg') }}" width=" 100%" height="100%">
        <div class="carousel-caption ">
            <h1>First slide label</h1>
            <h3>Nulla vitae elit libero, a pharetra augue mollis interdum.</h3>
        </div>
        </div>
        <div class="carousel-item">
        <img src="{{ asset('img/gambar 2.jpg') }}" width=" 100%" height="100%">
        <div class="carousel-caption ">
            <h1>First slide label</h1>
            <h3>Nulla vitae elit libero, a pharetra augue mollis interdum.</h3>
        </div>
        </div>
        <div class="carousel-item">
        <img src="{{ asset('img/rog.jpg') }}" width=" 100%" height="100%">
        <div class="carousel-caption ">
            <h1>First slide label</h1>
            <h3>Nulla vitae elit libero, a pharetra augue mollis interdum.</h3>
        </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col berita text-black-50">
                Berita Terbaru
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row mt-5">
            <div class="col-sm background-card mb-row mx-4">
                <div class="card mt-card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>

           <div class="col-sm background-card mb-row mx-4">
                <div class="card mt-card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
           

            <div class="col-sm background-card mb-row mx-4">
                <div class="card mt-card">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm background-card mb-row mx-4">
                <div class="card mt-card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>

           <div class="col-sm background-card mb-row mx-4">
                <div class="card mt-card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
           

            <div class="col-sm background-card mb-row mx-4">
                <div class="card mt-card">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col mx-4 col-overflow">
                <h2>PENGUMUMAN</h2>
                <div class="overflow">
                    <div class="card mt-3 card-flow">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p>This is some text within a card body.</p>
                            <a href="#" class="card-link">Selanjutnya...</a>
                        </div>
                    </div>

                    <div class="card mt-3 card-flow">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p>This is some text within a card body.</p>
                            <a href="#" class="card-link">Selanjutnya...</a>
                        </div>
                    </div>

                    <div class="card mt-3 card-flow">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p>This is some text within a card body.</p>
                            <a href="#" class="card-link">Selanjutnya...</a>
                        </div>
                    </div>

                    <div class="card mt-3 card-flow">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p>This is some text within a card body.</p>
                            <a href="#" class="card-link">Selanjutnya...</a>
                        </div>
                    </div>

                    <div class="card mt-3 card-flow">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p>This is some text within a card body.</p>
                            <a href="#" class="card-link">Selanjutnya...</a>
                        </div>
                    </div>
                 </div>
            </div>
            


             <div class="col mx-4 col-overflow">
                <h2>AGENDA</h2>
                <div class="overflow">
                    <div class="card mt-3 card-flow">
                        <div class="card-body">
                           <table class="table table-borderless text-white">
                                    <tr>
                                        <td rowspan="3" class="border border-secondary tgl-agenda"><h1>20 October</h1></td>
                                        <td>@twitter</td>
                                    </tr>
                                    <tr>
                                        <td>Larry the Bird</td>
                                    </tr>
                                    <tr>
                                        <td>Larry the Bird</td>
                                    </tr>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-3 card-flow">
                        <div class="card-body">
                           <table class="table table-borderless text-white">
                                    <tr>
                                        <td rowspan="3" class="border border-secondary tgl-agenda"><h1>20 October</h1></td>
                                        <td>@twitter</td>
                                    </tr>
                                    <tr>
                                        <td>Larry the Bird</td>
                                    </tr>
                                    <tr>
                                        <td>Larry the Bird</td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                    

                    <div class="card mt-3 card-flow">
                        <div class="card-body">
                           <table class="table table-borderless text-white">
                                    <tr>
                                        <td rowspan="3" class="border border-secondary tgl-agenda"><h1>20 October</h1></td>
                                        <td>@twitter</td>
                                    </tr>
                                    <tr>
                                        <td>Larry the Bird</td>
                                    </tr>
                                    <tr>
                                        <td>Larry the Bird</td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                    

                    <div class="card mt-3 card-flow">
                        <div class="card-body">
                           <table class="table table-borderless text-white">
                                    <tr>
                                        <td rowspan="3" class="border border-secondary tgl-agenda"><h1>20 October</h1></td>
                                        <td>@twitter</td>
                                    </tr>
                                    <tr>
                                        <td>Larry the Bird</td>
                                    </tr>
                                    <tr>
                                        <td>Larry the Bird</td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                    

                    <div class="card mt-3 card-flow">
                        <div class="card-body">
                           <table class="table table-borderless text-white">
                                    <tr>
                                        <td rowspan="3" class="border border-secondary tgl-agenda"><h1>20 October</h1></td>
                                        <td>@twitter</td>
                                    </tr>
                                    <tr>
                                        <td>Larry the Bird</td>
                                    </tr>
                                    <tr>
                                        <td>Larry the Bird</td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                    
                 </div>
            </div>

        </div>

           <div class="row mt-row">
                <div class="col col-info">
                    <i class="fas fa-user-friends fa-5x mt-1"></i>
                    <h5>71.000</h5>
                    <h5>Mahasiswa</h5>
                </div>
                <div class="col col-info">
                    <i class="fas fa-user-friends fa-5x mt-1"></i>
                    <h5>71.000</h5>
                    <h5>Mahasiswa</h5>
                </div>
                <div class="col col-info">
                    <i class="fas fa-user-friends fa-5x mt-1"></i>
                    <h5>71.000</h5>
                    <h5>Mahasiswa</h5>
                </div>
                <div class="col col-info">
                    <i class="fas fa-user-friends fa-5x mt-1"></i>
                    <h5>71.000</h5>
                    <h5>Mahasiswa</h5>
                </div>          
            </div>

    <div class="row mb-5 mt-5">
         <div class="col-sm-6">
            <div class="caption-2">
               <img src="http://placekitten.com/g/400/300" class="img-full-width img-rounded" />
               <h3>My Caption Goes Here</h3>
            </div>
         </div>
         <div class="col-sm-6">
            <div class="caption-2">
               <img src="http://placekitten.com/g/400/300" class="img-full-width img-rounded" />
               <h3>My Caption Goes Here</h3>
            </div>
         </div>
         <div class="col-sm-6">
            <div class="caption-2">
               <img src="http://placekitten.com/g/400/300" class="img-full-width img-rounded" />
               <h3>My Caption Goes Here</h3>
            </div>
         </div>
         <div class="col-sm-6">
            <div class="caption-2">
               <img src="http://placekitten.com/g/400/300" class="img-full-width img-rounded" />
               <h3>My Caption Goes Here</h3>
            </div>
         </div>
    </div>
</div>


        



<div id="demo" class="carousel slide background-sec" data-ride="carousel">
 
  <!-- The slideshow -->
  <div class="container carousel-inner no-padding">
    <div class="carousel-item active">
        <div class="row">
            <div class="col-xs-6 col-sm-2 col-md-2">
              <img src="https://image.shutterstock.com/z/stock-photo-sleeping-disorders-as-a-reason-for-insomnia-293777093.jpg" alt="Avatar" class="image" style="width:100%">
            </div>   

            <div class="col-xs-6 col-sm-2 col-md-2">
              <img src="https://image.shutterstock.com/z/stock-photo-sleeping-disorders-as-a-reason-for-insomnia-293777093.jpg" alt="Avatar" class="image" style="width:100%">
            </div>  

            <div class="col-xs-6 col-sm-2 col-md-2">
              <img src="https://image.shutterstock.com/z/stock-photo-sleeping-disorders-as-a-reason-for-insomnia-293777093.jpg" alt="Avatar" class="image" style="width:100%">
            </div>   

            <div class="col-xs-6 col-sm-2 col-md-2">
              <img src="https://image.shutterstock.com/z/stock-photo-sleeping-disorders-as-a-reason-for-insomnia-293777093.jpg" alt="Avatar" class="image" style="width:100%">
            </div>  

            <div class="col-xs-6 col-sm-2 col-md-2">
              <img src="https://image.shutterstock.com/z/stock-photo-sleeping-disorders-as-a-reason-for-insomnia-293777093.jpg" alt="Avatar" class="image" style="width:100%">
            </div> 

            <div class="col-xs-6 col-sm-2 col-md-2">
              <img src="https://image.shutterstock.com/z/stock-photo-sleeping-disorders-as-a-reason-for-insomnia-293777093.jpg" alt="Avatar" class="image" style="width:100%">
            </div> 
        </div>


    </div> 
      <div class="carousel-item">
      <div class="row">
            <div class="col-xs-6 col-sm-2 col-md-2">
              <img src="https://image.shutterstock.com/z/stock-photo-sleeping-disorders-as-a-reason-for-insomnia-293777093.jpg" alt="Avatar" class="image" style="width:100%">
            </div>   

            <div class="col-xs-6 col-sm-2 col-md-2">
              <img src="https://image.shutterstock.com/z/stock-photo-sleeping-disorders-as-a-reason-for-insomnia-293777093.jpg" alt="Avatar" class="image" style="width:100%">
            </div>  

            <div class="col-xs-6 col-sm-2 col-md-2">
              <img src="https://image.shutterstock.com/z/stock-photo-sleeping-disorders-as-a-reason-for-insomnia-293777093.jpg" alt="Avatar" class="image" style="width:100%">
            </div>   

            <div class="col-xs-6 col-sm-2 col-md-2">
              <img src="https://image.shutterstock.com/z/stock-photo-sleeping-disorders-as-a-reason-for-insomnia-293777093.jpg" alt="Avatar" class="image" style="width:100%">
            </div>  

            <div class="col-xs-6 col-sm-2 col-md-2">
              <img src="https://image.shutterstock.com/z/stock-photo-sleeping-disorders-as-a-reason-for-insomnia-293777093.jpg" alt="Avatar" class="image" style="width:100%">
            </div> 

            <div class="col-xs-6 col-sm-2 col-md-2">
              <img src="https://image.shutterstock.com/z/stock-photo-sleeping-disorders-as-a-reason-for-insomnia-293777093.jpg" alt="Avatar" class="image" style="width:100%">
            </div> 
        </div>     
    </div>
  </div>
  


  <!-- Left and right controls -->


  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>


    </div>

    @endsection