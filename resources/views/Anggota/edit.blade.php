@extends('layout.main') 

@section('title','anggota')

@section('content')
<div class="row">
    {{-- formulir tambah fakultas --}}
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tambah Anggota</h4>
            <p class="card-description">
              Formulir tambah Anggota
            </p>
            <form method="POST" action="{{ route('anggota.update',$anggota["id"])}}" class ="forms-sample">
            @method('put')
            @csrf
              <div class="form-group">
                <label for="nama">Nama Anggota</label>
                <input type="text" class="form-control" name="nama_anggota" placeholder="">
              </div>

              <div class="form-group">
                <label for="nama">Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="">
              </div>
              <div class="form-group">
                <label for="nama">noHp</label>
                <input type="text" class="form-control" name="nohp" placeholder="">
              </div>
              
              {{-- <div class="form-group">
                <label for="text">kode_buku</label>
                <select name="buku_id" class="form-control">
                    @foreach ($buku as $item)
                        <option value={{$item['id']}}>
                            {{$item['kode_buku']}}
                        </option>
                    @endforeach
                </select>
                @error('buku_id')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                @enderror --}}
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a href="{{ url('anggota')}}" class="btn btn-light">Batal</a>
            </form>
          </div>
        </div>
      </div>
</div> 
@endsection 