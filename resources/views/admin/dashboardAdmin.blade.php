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
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Admin Counter -->
            <div class=" col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Admin</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$admin}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fab fa-odnoklassniki fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Dosen Counter -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Dosen</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dosen}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <!-- Tenaga Pendidik Counter -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tenaga Kerja</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$tenaga}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-briefcase fa-2x text-gray-300"></i>
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
                  <h6 class="m-0 font-weight-bold text-primary">Jumlah Mahasiswa</h6>
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
                  <h6 class="m-0 font-weight-bold text-primary">Staff</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Dosen
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> Tenaga Kerja
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Admin
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
                      <div class="calender chart-area">
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

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: {!! json_encode($angkatan_fix) !!},
    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: {!! json_encode($total) !!},
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return number_format(tooltipItem.yLabel) + " Mahasiswa";
        }
      }
    }
  }
});


// Pie Chart Example
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Admin", "Tenaga Kerja", "Dosen"],
    datasets: [{
      data: {!! json_encode($lainnya) !!},
      backgroundColor: ['#4e73df', '#edca2f', '#5cb85c'],
      hoverBackgroundColor: ['#2e59d9', '#cfad1b', '#05990a'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>
@endsection
