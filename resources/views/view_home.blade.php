@extends('layout.main')
@section('title', 'home')

@section('content')
<div class="alert alert-info text-center">
    <h1 style="margin-bottom: 0px"><b>Selamat Datang</b>  di Perpustakaan JAYA</h1>
    
    {{-- <img src="img_perpustakaan.jpg" alt="perpustakaan">   --}}
  </div>
    <div class="col-mb-6">
        <img src="{{url('images')}}/naperic.jpg" width="100%" height="400px">
    </div>

    <div class="site-section" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-5">
            <h1 class="text-black serif text-uppercase mb-4">VISI</h1>
              <p class="text-black mb-5">Rajin membaca sumber belajar dari buku yang tersedia di perpustakaan JAYA,
                  Menjadi perpustakaan JAYA yang berfokus pada pengembangan karakter dan moral Mahasiswa</p>
            <h1 class="text-black serif text-uppercase mb-4">MISI</h1>
            <ul>
              <li>Menyediakan sumber-sumber referensi yang lengkap dan berkualitas</li>
              <li>Menyediakan berbagai layanan berorientasi riset dan teknologi yang tepat, akurat dan cepat</li>
              <li>Membangun kerjasama yang efektif dengan masyarakat kampus dan institusi atau organisasi</li>
            </ul>
          
          <div class="col-md-4">
            {{-- <div class="testimonial bg-white h-100"> --}}
              <blockquote class="mb-3">
                
              <div class="d-flex align-items-center vcard">
                <div class="vcard-text">
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            {{-- <div class="testimonial bg-white h-100"> --}}
              <blockquote class="mb-3">
                <div class="d-flex align-items-center vcard">
                <div class="vcard-text">
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <h3>PENGERTIAN PERPUSTAKAAN MENURUT PARA AHLI</h3>
    <p>
    <h4>PERPUSTAKAAN</h4>
        Secara lebih konkrit perpustakaan dapat dirumuskan sebagai suatu unit kerja dari sebuah 
        lembaga pendidikan yang berupa tempat penyimpanan koleksi buku-buku pustaka untuk menunjang 
        proses pendidikan. Dari beberapa pengertian diatas, dapat disimpulkan bahwa perpustakaan adalah 
        tempat untuk mengembangkan informasi dan pengetahuan yang dikelola oleh suatu lembaga pendidikan, 
        sekaligus sebagai sarana edukatif untuk membantu memperlancar cakrawala pendidik dan peserta 
        didik dalam kegiatan belajar mengajar.
    </p>

@endsection