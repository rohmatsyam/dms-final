<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
<x-admin-layout>
    <x-slot name="header">
        <h2 class="fw-bold m-0">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="my-4 card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <img src="{{ asset('img/undraw_profile_2.svg') }}" style="width: 180px">
                    <p>{{ auth()->user()->name }}</p>
                </div>
            </div>
            <p class="text-center">Welcome back :D</p>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Saldo</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 226.278,00</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Pengeluaran</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 2.698.900,00</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-arrow-up fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Pemasukan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 2.472.171,00</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-arrow-down fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2" >
                    <div class="row">
                        <div class="col-md-12" style="text-align: center;">
                            <img src="{{ asset('img/ch1.png') }}" style="width: 95px; margin-top: 80px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="text-align: center;">
                            <img src="{{ asset('img/ch2.png') }}" style="width: 95px; margin-top: 21px;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12" style="text-align: center;">
                            <img src="{{ asset('img/ch3.png') }}" style="width: 95px; margin-top: 21px;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12" style="text-align: center;">
                            <img src="{{ asset('img/ch4.png') }}" style="width: 50px; margin-top: 21px;">
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Semua Pesanan</th>
                        <th>Batal</th>
                        <th>Ongkos Kirim</th>
                        <th>SKU Terjual</th>
                        <th>Pesanan/hari(Avg)</th>
                        <th>Persen(Avg)</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        
    </div>

    <div class="my-4 card">
        <div class="row">
            <div class="col-xl-8">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Penjualan & Pengembalian Barang</h6>                            
                </div>
                <div class="card-body">
                    <div id="myAreaChart" style="height: 400px;"></div>
                </div>
            </div>
            <div class="col-xl-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kategori Terbaik</h6>
                    <div class="pull-right" style="background-color: #004DC3; color: white; font-size: 10px; padding-left: 5px; padding-right: 5px;">
                            Bulan ini
                    </div>
                        
                </div>
                <div class="card-body">
                    <div class="row" style="height: 400px;">
                        <div class="col-md-5" style="padding: 100px 0;">
                        <img src="{{ asset('img/kt.png') }}" class="img-thumnails" style="width: 150px;">
                        </div>
                        <div class="col-md-7" style="text-align: center; padding: 100px 0;">
                            <label style=" font-size:24px; margin-top: 30px">sweet choco jacket</label> <p>terjual 5</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

    
<script type="text/javascript">

  var chart;
  $(document).ready(function() {
   chart = new Highcharts.Chart({
    chart: {
     renderTo: 'myAreaChart',
     zoomType: 'xy'
    },
    title: {
     text: ''
    },
    subtitle: {
     text: ''
    },
    xAxis: [{
     categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
      'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    }],
    yAxis: [{ // Primary yAxis
     labels: {
      formatter: function() {
       return this.value +'';
      },
      style: {
       color: '#89A54E'
      }
     },
     title: {
      text: '',
      style: {
       color: '#89A54E'
      }
     }
    }, { // Secondary yAxis
     title: {
      text: '',
      style: {
       color: '#4572A7'
      }
     },
     labels: {
      formatter: function() {
       return this.value +'';
      },
      style: {
       color: '#4572A7'
      }
     },
     opposite: true
    }],
    tooltip: {
     formatter: function() {
      return ''+
       this.x +': '+ this.y +
       (this.series.name == 'TCH Drop Rate' ? '' : '');
     }
    },
    legend: {
     layout: 'vertical',
     align: 'left',
     x: 100,
     verticalAlign: 'top',
     y: 50,
     floating: true,
     backgroundColor: '#FFFFFF'
    },
    series: [{
     name: 'Penjualan',
     color: '#4572A7',
     type: 'column',
     yAxis: 1,
     data: [49.9, 71.5, 99.9811, 129.2, 144.0, 176.0, 135.6, 148.5, 716.4, 194.1, 95.6, 54.4] 
   
    }, {
     name: 'Pengembalian Barang',
     color: '#89A54E',
     type: 'spline',
     data: [7.0, 6.9, 9.5, 14.5, 25.2, 21.5, 25.2, 10.5, 23.3, 18.3, 13.9, 9.6]
    }]
   });
  
  
  });
  
 </script>
