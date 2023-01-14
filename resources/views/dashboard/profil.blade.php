@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h1 class="m-0">PROFIL</h1>
            <hr>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Lihat Profil</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
       <div class="profil" style="margin-left: 20px">
           <h6>Nama</h6>
           <h4>{{ Auth::user()->name}}</h4>
           <br>
           <h6>NIP</h6>
           <h4>{{ Auth::user()->nip}}</h4>
           <br>
           <h6>Jenis kelamin</h6>
           <h4>{{ Auth::user()->jeniskelamin}}</h4>
           <br>
           <h6>No Hp</h6>
           <h4>{{ Auth::user()->nohp}}</h4>
           <br>
           <h6>Email</h6>
           <h4>{{ Auth::user()->email}}</h4>
           <br>
       </div>
    </div>


@endsection