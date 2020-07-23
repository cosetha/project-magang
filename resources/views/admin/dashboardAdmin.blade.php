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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class=" col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Admin</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Dosen</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">100</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tenaga Pendidik</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- Calender -->
          <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <div class="kalender">
                    <div class="sideb">
                      <div class="header">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span>
                          <span class="month"> </span>
                          <span class="year"></span>
                        </span>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                      </div>
                      <div class="calender">
                        <table>
                          <thead>
                            <tr class="weedays">
                              <th data-weekday="sun" data-column="0">Sun</th>
                              <th data-weekday="mon" data-column="1">Mon</th>
                              <th data-weekday="tue" data-column="2">Tue</th>
                              <th data-weekday="wed" data-column="3">Wed</th>
                              <th data-weekday="thu" data-column="4">Thu</th>
                              <th data-weekday="fri" data-column="5">Fri</th>
                              <th data-weekday="sat" data-column="6">Sat</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="days" data-row="0">
                              <td data-column="0"></td>
                              <td data-column="1"></td>
                              <td data-column="2"></td>
                              <td data-column="3"></td>
                              <td data-column="4"></td>
                              <td data-column="5"></td>
                              <td data-column="6"></td>
                            </tr>
                            <tr class="days" data-row="1">
                              <td data-column="0"></td>
                              <td data-column="1"></td>
                              <td data-column="2"></td>
                              <td data-column="3"></td>
                              <td data-column="4"></td>
                              <td data-column="5"></td>
                              <td data-column="6"></td>
                            </tr>
                            <tr class="days" data-row="2">
                              <td data-column="0"></td>
                              <td data-column="1"></td>
                              <td data-column="2"></td>
                              <td data-column="3"></td>
                              <td data-column="4"></td>
                              <td data-column="5"></td>
                              <td data-column="6"></td>
                            </tr>
                            <tr class="days" data-row="3">
                              <td data-column="0"></td>
                              <td data-column="1"></td>
                              <td data-column="2"></td>
                              <td data-column="3"></td>
                              <td data-column="4"></td>
                              <td data-column="5"></td>
                              <td data-column="6"></td>
                            </tr>
                            <tr class="days" data-row="4">
                              <td data-column="0"></td>
                              <td data-column="1"></td>
                              <td data-column="2"></td>
                              <td data-column="3"></td>
                              <td data-column="4"></td>
                              <td data-column="5"></td>
                              <td data-column="6"></td>
                            </tr>
                            <tr class="days" data-row="5">
                              <td data-column="0"></td>
                              <td data-column="1"></td>
                              <td data-column="2"></td>
                              <td data-column="3"></td>
                              <td data-column="4"></td>
                              <td data-column="5"></td>
                              <td data-column="6"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                 </div>
               </div>
             </div>
           </div>
      </div>
      <!-- End of Main Content -->
      @endsection