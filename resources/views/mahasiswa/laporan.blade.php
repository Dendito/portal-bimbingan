@extends('layouts.admin')
@section('content')
<style>
    .not-found {
        color: rgb(255, 0, 0);
    }
</style>
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
              <li class="breadcrumb-item active">Laporan Mahasiswa</li>
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
            <h3 class="fw-bold">Laporan Mahasiswa</h3>
            <div class="card-body">
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto" style="width: 400px">
                        <form action="{{route('laporan.index') }}" method="GET">
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
                                <th>Status Laporan</th>
                                <th>File Laporan</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                      
                            @foreach ($laporans as $laporan)
                                
                            <tr @if($loop->odd)  style="background-color: #f1f3f5;"  @endif>
                                <td class="align-middle" style="text-align: center">{{ $loop->iteration + $laporans->firstItem() - 1 }}</td>
                                <td class="align-middle" style="text-align: center">{{ $laporan->npm }}</td>
                                <td class="align-middle" style="text-align: center">{{ $laporan->nama }}</td>
                                <td class="align-middle" style="text-align: center">{{ $laporan->prodi}}</td>
                                <td class="align-middle" style="text-align: center">{{ $laporan->laporan->status_laporan}}</td>
                                <td class="align-middle" style="text-align: center">{{ $laporan->laporan->file_laporan }}</td>
                                <td class="align-middle" style="text-align: center;">{{ $laporan->laporan->nilai ?? 'Belum dinilai'}}</td>
                                <td align="center">
                                  <a href="" data-toggle="modal" data-target="#exampleModal-{{ $laporan->id }}" class="btn btn-warning ">Nilai</a>
                                  </td>
                            @endforeach    
                         </tbody>
                    </table>
                    <div class="d-flex justify-content-start sm">
                        Showing
                        {{ $laporans->firstItem() }}
                        to
                        {{ $laporans->lastItem() }}
                        of
                        {{ $laporans->total() }}
                        entries
                    </div>
                    <div class="paginate d-flex justify-content-center sm">
                    {{ $laporans->links() }}
                </div>
                </div>
                          
                       @foreach ($laporans as $data)
                       <!-- Modal -->
                       <div class="modal fade" id="exampleModal-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"    
                        aria-hidden="true">
                         <div class="modal-dialog" role="document">
                           <div class="modal-content">
                             <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalLabel">Masukkan Nilai Laporan Mahasiswa</h5>
                              
                             </div>
                             <div class="modal-body">
                                <form action="{{ route('laporan.update', $data->id) }}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <label for="npm">NPM</label>
                                        <input type="text" name="npm"  id="npm" 
                                        value="{{ old('npm')??$data->npm}}" class="form-control"  readonly>
                                        @error('npm')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <br>
                                    <div class="form-floating mb-3">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama"  id="nama" 
                                        value="{{ old('nama')??$data->nama}}" class="form-control" readonly>
                                        @error('nama')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <br>
                                        <div class="form-floating mb-3">
                                            <label for="prodi">Program Studi</label>
                                            <input type="text" name="prodi"  id="prodi" 
                                            value="{{ old('prodi')??$data->prodi}}" class="form-control"  readonly>
                                            @error('prodi')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <br>
                                    <div class="form-floating mb-3">
                                        <label for="status_laporan">Status Laporan</label>
                                        <input type="text" name="status_laporan"  id="status_laporan" 
                                        value="{{ old('status_laporan')??$data->laporan->status_laporan}}" class="form-control"  readonly>
                                        @error('status_laporan')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <br>
                                    <div class="form-floating mb-3">
                                        <label for="file_laporan">File Laporan</label>
                                        <input type="text" name="file_laporan"  id="file_laporan" 
                                        value="{{ old('file_laporan')??$data->laporan->file_laporan}}" class="form-control"  readonly>
                                        @error('file_laporan')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <br>
                                  
                                        <div class="form-floating mb-3">
                                            <label for="nilai">Nilai</label>
                                            <input type="number" name="nilai"  id="nilai" placeholder="0/100" 
                                            value="{{ old('nilai')??$data->laporan->nilai}}" class="form-control">
                                            @error('nilai')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                 
                                    <button type="submit" class="btn btn-primary">Nilai</button>
                                </form>
                                </div>
                            </div>
                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                       @endforeach
                  
                           


@endsection

