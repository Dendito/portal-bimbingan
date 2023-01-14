@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">BIMBINGAN</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/index">Home</a></li>
              <li class="breadcrumb-item active">Bimbingan Mahasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>



<div class="row">
    <div class="col-md-12">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        
        @error(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data gagal diubah, silahkan cek kembali form yang anda isi!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror

        <div class="card p-4">
            <h3 class="fw-bold">Bimbingan Mahasiswa</h3>
            <div class="card-body">
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto" style="width: 400px">
                        <form action="{{route('bimbingan.index') }}" method="GET">
                            <input type="search" id="search" name="search" placeholder="Search Nama or Prodi" class="form-control mb-3" aria-describedby="passwordHelpInline">
                        </form>
                    </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr  class="align-middle" style="text-align: center">
                                <th>NO</th>
                                <th>NPM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Program Studi</th>
                                <th>Mitra</th>
                                <th>Posisi</th>
                            </tr>
                        </thead>
                        <tbody>
                      
                           @foreach ($bimbings as $bimbing)
                               
                           <tr @if($loop->odd)  style="background-color: #f1f3f5;"  @endif>
                               <td class="align-middle" style="text-align: center">{{ $loop->iteration + $bimbings->firstItem() - 1 }}</td>
                               <td class="align-middle" style="text-align: center">{{ $bimbing->npm }}</td>
                               <td class="align-middle" style="text-align: center">{{ $bimbing->nama }}</td>
                               <td class="align-middle" style="text-align: center">{{ $bimbing->prodi}}</td>
                               <td class="align-middle" style="text-align: center">{{ $bimbing->bimbingan->mitra}}</td>
                               <td class="align-middle" style="text-align: center">{{ $bimbing->bimbingan->posisi }}</td>
                           @endforeach    
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-start sm">
                        Showing
                        {{ $bimbings->firstItem() }}
                        to
                        {{ $bimbings->lastItem() }}
                        of
                        {{ $bimbings->total() }}
                        entries
                    </div>
                    <div class="paginate d-flex justify-content-center sm">
                    {{ $bimbings->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

