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
              <li class="breadcrumb-item active">Mahasiswa Bimbingan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="row-md">
   
      <div class="card p-4">
          <h3 class="fw-bold">Mahasiswa</h3>
          <div class="card-body">
              <div class="row g-3 align-items-center mb-3">
                  <div class="col-auto" style="width: 400px">
                      <form action="{{route('mahasiswa.index') }}" method="GET">
                          <input type="search" id="search" name="search" placeholder="Search Nama or Prodi" class="form-control mb-3" aria-describedby="passwordHelpInline">
                      </form>
                  </div>
                 
                  <div class="table-responsive">
              @foreach ($mahasiswas as $mahasiswa)
                <div class="card ">
                  
                  <div class="row">
                    <div class="col-sm-4 d-flex justify-content-center">
                      <img src="https://cdn4.iconfinder.com/data/icons/top-search-7/128/_user_account_profile_head_person_avatar-512.png"
                       alt=""  class="img-fluid"  width="100px" >
                    </div>
                    <div class="col-md-8">
                      <table style="max-width:1000px" class="card-title">
                          <td>NPM</td>
                          <td style="padding-left: 20px">:</td>
                          <td style="padding-left: 10px">{{  $mahasiswa->npm }}</td>
                        </tr>
                        <tr>
                          <td>Nama</td>
                          <td style="padding-left: 20px">:</td>
                          <td style="padding-left: 10px">{{  $mahasiswa->nama }}</td>
                        </tr>
                        <tr>
                          <td>Prodi</td>
                          <td style="padding-left: 20px">:</td>
                          <td style="padding-left: 10px">{{  $mahasiswa->prodi }}</td>
                        </tr>
                        <tr>
                          <td>IPK:</td>
                          <td style="padding-left: 20px">:</td>
                          <td style="padding-left: 10px">{{  $mahasiswa->ipk }}</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-start sm">
                  Showing
                  {{ $mahasiswas->firstItem() }}
                  to
                  {{ $mahasiswas->lastItem() }}
                  of
                  {{ $mahasiswas->total() }}
                  entries
              </div>
              <div class="paginate d-flex justify-content-center sm">
              {{ $mahasiswas->links() }}
          </div>
          </div>
      </div>
                  
      </div>
  </div>
</div>



@endsection

