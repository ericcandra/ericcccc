@extends('layout.main')

@section('title','petugas')

@section('content')
<div class="row">
    {{-- formulirtambah fakultas --}}
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tambah Petugas</h4>
            <p class="card-description">
              Formulir tambah Petugas
            </p>
            <form method="POST" action="{{ route('petugas.store')}}" class ="forms-sample">
            @csrf
              <div class="form-group">
                <label for="nama">Nama Petugas</label>
                <input type="text" class="form-control" name="nama_petugas" placeholder="">
              </div>
              

              <div class="form-group">
                <label for="nama">nohp</label>
                <input type="text" class="form-control" name="nohp" placeholder="">
              </div>
              <div class="form-group">
                <label for="nama">Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="">
              </div>
              
              
                
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a href="{{ url('petugas')}}" class="btn btn-light">Batal</a>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection