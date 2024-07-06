@extends('layout.main')

@section('title','petugas')

@section('content')
    {{-- <h1>UMDP</h1>
    <h2>prodi</h2>
    <ul>
    @foreach ($prodi as $item)
        <li>{{$item ["nama"]}}{{$item["singkatan"]}}</li>
    @endforeach --}}
    </ul>
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Petugas</h4>
                  <p class="card-description">
                    Add class <code>list data Petugas</code>
                  </p>
                  @can('create',App\petugas::class)
                  <a href="{{route('petugas.create')}}" class="btn btn-rounded btn-primary">Tambah</a>
                  @endcan
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nama Petugas</th>
                          <th>nohp</th>
                          <th>Alamat</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($petugas as $item)
                        <tr>
                            <td>{{$item ["nama_petugas"]}}</td>
                            <td>{{$item["nohp"]}}</td>
                            <td>{{$item["alamat"]}}</td>
                            <td>
                              @can('delete',$item)
                              <form action="{{route('petugas.destroy',$item['id'])}}" method="post" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-rounded btn-danger show_confirm" data-name="{{$item["nama_petugas"]}}">Hapus</button>
                            
                              </form>
                              @endcan
                              @can('update',$item)
                              <a href="{{route('petugas.edit',$item["nama_petugas"])}}" class="btn btn-sm btn-rounded btn-warning">ubah</a>
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
                  title: "Good job!",
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