@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">DASHBOARD</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $mahasiswas }}</h3>
    
                  <p>Jumlah Data Mahasiswa Bimbingan</p>
                </div>
                <div class="icon">
                  <i class="icon ion-md-people"></i>
                </div>
                <a href="/mahasiswa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
            <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $bimbingans }}</h3>
    
                  <p>Jumlah Data Bimbingan Mahasiswa</p>
                </div>
                <div class="icon">
                    <i class="icon ion-md-book"></i>
                </div>
                <a href="/bimbingan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                  <div class="inner">
                    <h3>{{ $laporans }}</h3>
      
                    <p>Jumlah Data Laporan Mahasiswa</p>
                  </div>
                  <div class="icon">
                    <i class="icon ion-md-copy"></i>
                  </div>
                  <a href="/laporan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="container-fluid">
                <div id="chartNilai"></div>
              </div>



              <script src="https://code.highcharts.com/highcharts.js"></script>
              <script>Highcharts.chart('chartNilai', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Minat Daftar Magang Portal Bimbingan 2022'
                },
                xAxis: {
                    categories: [
                       'Agustus',
                       'September',
                       'Desember'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Pendaftar'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} Total Pendaftar</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'PT Amazon',
                    data: [1,2]
            
                }, {
                    name: 'PT Shopee',
                    data: [2, 4, 6]
            
                }, {
                    name: 'PT Tokopedia',
                    data: [1,2
                        ]
            
                }]
            });
              </script>
       

         
    
                
         
  


@endsection