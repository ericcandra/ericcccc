@extends('layout.main')

@section('title','Buku')

@section('content')
<div class="row">
    {{-- formulirtambah buku --}}
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Ubah Buku</h4>
            <p class="card-description">
              Formulir ubah Buku
            </p> 
            <form method="POST" action="{{ route('buku.update',$buku["kode_buku"])}}" class ="forms-sample">
            @method('put')
            @csrf
              <div class="form-group">
                <label for="nama">Kode Buku</label>
                <input type="text" class="form-control" name="kode_buku" placeholder="kode buku">
              </div>
                  
              <div class="form-group">
                <label for="nama">Nama Buku</label>
                <input type="text" class="form-control" name="nama_buku" placeholder="nama buku">
              </div>
              <div class="form-group">
                <label for="nama">Pengarang</label>
                <input type="text" class="form-control" name="pengarang" placeholder="pengarang">
              </div>
              <div class="form-group">
                <label for="nama">Kategori</label>
                <input type="text" class="form-control" name="kategori" placeholder="kategori">
              </div> 
              <div class="form-group">
                <label for="nama">Stok</label>
                <input type="text" class="form-control" name="kategori" placeholder="kategori">
              </div> 
                    {{-- @foreach ($buku as $item) 
                        <option value="{{$item['nama_buku']}}" {{(old('buku_id')==$item["nama_buku"])? "selected":($buku['nama_buku']==$item["nama_buku"]?"Selected":null)}}>
                            {{$item['nama_buku']}}
                        </option>
                    @endforeach --}}
              <button type="submit" class="btn btn-primary mr-2">Submit</button> 
              <a href="{{ url('buku')}}" class="btn btn-light">Batal</a>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection