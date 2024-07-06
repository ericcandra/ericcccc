@extends('layout.main')

@section('title','pinjam')

@section('content')
<div class="row">
    {{-- formulirtambah fakultas --}}
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Ubah pinjam</h4>
            <p class="card-description">
              Formulir ubah pinjam
            </p>
            <form method="POST" action="{{ route('pinjam.update',$pinjam['id'])}}" class ="forms-sample" enctype="multipart/form-data">
            @method('put');
            @csrf
              <div class="form-group">
                <label for="text">Jumlah Pinjam</label>
                <input type="text" class="form-control" name="jumlah_pinjam" placeholder="">
              </div>
              
              <div class="form-group">
                <label for="date">tanggal Pinjam</label>
                <input type="date" class="form-control" name="tanggal_pinjam" placeholder="">a
              </div>

              <div class="form-group">
                <label for="date">tanggal Kembalian</label>
                <input type="date" class="form-control" name="tanggal_kembalian" placeholder="">a
              </div>
                          
              <div class="form-group">
                <label for="text">buku_id</label>
                <select name="buku_id" class="form-control">
                    @foreach ($buku as $item)
                        <option value="{{$item['id']}}">
                            {{$item['kode_buku']}}
                        </option>
                    @endforeach
                </select>
                @error('buku_id')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                @enderror
                <div class="form-group">
                  <label for="text">buku_id</label>
                  <select name="buku_id" class="form-control">
                      @foreach ($buku as $item)
                          <option value="{{$item['id']}}">
                              {{$item['nama_buku']}}
                          </option>
                      @endforeach
                  </select>
                  @error('buku_id')
                      <span class="text-danger">
                          {{$message}}
                      </span>
                  @enderror
                <div class="form-group">
                    <label for="text">anggota_id</label>
                    <select name="anggota_id" class="form-control">
                        @foreach ($anggota as $item)
                            <option value="{{$item['id']}}">
                                {{$item['nama_anggota']}}
                            </option>
                        @endforeach
                    </select>
                    @error('anggota_id')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                    @enderror

              </div>

              <div class="form-group">
                <label for="text">petugas_id</label>
                <select name="petugas_id" class="form-control">
                    @foreach ($petugas as $item)
                        <option value="{{$item['id']}}">
                            {{$item['nama_petugas']}}
                        </option>
                    @endforeach
                </select>
                @error('petugas_id')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                @enderror

          </div>
              {{-- <div class="form-group">
                <label for="text">url foto</label>
                <input type="file" class="form-control" name="url_foto"
                @error('url_foto')
                  <span class="text-danger">{{$message}}</span>    
                @enderror>
              </div> --}}
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a href="{{ url('pinjam')}}" class="btn btn-light">Batal</a>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection