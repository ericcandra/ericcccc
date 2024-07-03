@extends('layout.main')

@section('title','Buku')

@section('content')
    {{-- <h1>UMDP</h1>
    <h2>Fakultas</h2>
    <ul>
    @foreach ($fakultas as $item)
        <li>{{$item ["nama"]}}{{$item["singkatan"]}}</li>
    @endforeach --}}
    </ul>
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">buku</h4>
                  <p class="card-description">
                    Add class <code>list data buku</code>
                  </p>
                  {{-- {{tombol tambah}} --}}
                  @can('create',App\buku::class)
                  <a href="{{route('buku.create')}}" class="btn btn-rounded btn-primary">Tambah</a>
                  @endcan
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Kode Buku</th>
                          <th>Nama Buku</th>
                          <th>Pengarang</th>
                          <th>Kategori</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($buku as $item)
                        <tr>
                            <td>{{$item["kode_buku"]}}</td>
                            <td>{{$item["nama_buku"]}}</td>
                            <td>{{$item["pengarang"]}}</td>
                            <td>{{$item["kategori"]}}</td>
                            <td>
                              @can('delete',$item)
                              <form action="{{route('buku.destroy',$item['id'])}}" method="post" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-rounded btn-danger show_confirm" data-name="{{$item["kode_buku"]}}">Hapus</button>
                            
                              </form>
                              @endcan
                              @can('update',$item)
                              {{-- <a href="{{route('buku.edit',$item["kode_buku"])}}" class="btn btn-sm btn-rounded btn-warning">ubah</a> --}}
                              @endcan  
                            </td>

                        </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            @if(session('success'))
              
              <script>
                  Swal.fire({
                    title: "yakin",
                    text: "{{session('success') }}",
                    icon: "success"
                  });
              </script>
            @endif
            <script type="text/javascript">
           
              $('.show_confirm').click(function(event) {
                   var form =  $(this).closest("form");
                   var name = $(this).data("name");
                   event.preventDefault();
                   Swal.fire({
                    title: "yakin mau dihapus?",
                    text: "setelah dihapus data tidak bisa dikembalikan",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "ya, hapus!"
                  })
                  .then((result) => {
                  if (result.isConfirmed) {
                  Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: ""
                  });
                  }
                  });
                   .then((willDelete) => {
                     if (willDelete.isConfirmed) {
                       form.submit();
                     }
                   });
               });
           
         </script>
@endsection