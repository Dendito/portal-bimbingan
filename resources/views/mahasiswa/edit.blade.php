@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-8">
                <h2>Masukkan Nilai Laporan</h2>
               @if (session()->has('message'))
               <div class="my-3">
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            </div> 
            
               @endif 
               <form action="{{ route('laporan.update', $laporan->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-floating mb-3">
                    <label for="npm">NPM</label>
                    <input type="text" name="npm"  id="npm" 
                    value="{{ old('npm')??$laporan->npm}}" class="form-control"  readonly>
                    @error('npm')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>
                <div class="form-floating mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama"  id="nama" 
                    value="{{ old('nama')??$laporan->nama}}" class="form-control" readonly>
                    @error('nama')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>
                <div class="form-floating mb-3">
                    <label for="prodi">Program Studi</label>
                    <input type="text" name="prodi"  id="prodi" 
                    value="{{ old('prodi')??$laporan->prodi}}" class="form-control"  readonly>
                    @error('prodi')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>
                <div class="form-floating mb-3">
                    <label for="nilai">Nilai</label>
                    <input type="text" name="nilai"  id="nilai" 
                    value="{{ old('nilai')??$laporan->laporan->nilai}}" class="form-control" >
                    @error('nilai')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                    </div>
                <button type="submit" class="btn btn-primary">Nilai</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
@endsection