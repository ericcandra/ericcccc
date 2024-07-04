
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Booke Colorlib Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url ('fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{url ('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url ('css/animate.css')}}">
    <link rel="stylesheet" href="{{url ('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url ('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url ('css/bootstrap-datepicker.css')}}">
    
    
    <link rel="stylesheet" href="{{url ('fonts/flaticon/font/flaticon.css')}}">
  
    <link rel="stylesheet" href="{{url ('css/aos.css')}}">
    <link rel="stylesheet" href="{{url ('css/jquery.fancybox.min.css')}}">
    

    <link rel="stylesheet" href="{{url ('css/style.css')}}">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <div class="site-navbar-wrap">
      
      <div class="site-navbar site-navbar-target js-sticky-header">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-6 col-lg-3">
              <h1 class="my-0 site-logo"><img src="{{url('images')}}/nabila.jpg" width="100%" height="220px">
                {{-- <a href="{{url ('index.html')}}"></a></h1> --}}
            </div>
            <div class="col-6 col-lg-9">
              <nav class="site-navigation text-right" role="navigation">
                <div class="container">

                  <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3 "><a href="{{url('#')}}" class="site-menu-toggle js-menu-toggle text-black">
                    <span class="icon-menu h3"></span>
                  </a></div>
                  
                  <ul class="site-menu main-menu js-clone-nav d-none d-lg-block">
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('dashboard')}}">
                        <i class="mdi mdi-view-quilt menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('home')}}">
                        <i class="mdi mdi-view-quilt menu-icon"></i>
                        <span class="menu-title">Home</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('buku')}}">
                        <i class="mdi mdi-view-quilt menu-icon"></i>
                        <span class="menu-title">Buku</span>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('anggota')}}">
                        <i class="mdi mdi-view-quilt menu-icon"></i>
                        <span class="menu-title">Anggota</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('petugas')}}">
                        <i class="mdi mdi-view-quilt menu-icon"></i>
                        <span class="menu-title">Petugas</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('pinjam')}}">
                        <i class="mdi mdi-view-quilt menu-icon"></i>
                        <span class="menu-title">Peminjaman</span>
                      </a>
                    </li>
                  
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
  
                      <x-responsive-nav-link :href="route('logout')"
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
                          {{ __('Log Out') }}
                      </x-responsive-nav-link>
                  </form>
                    {{-- <li><a href="{{url ('#buku')}}" class="nav-link">buku</a></li>
                    <li><a href="{{url ('#anggota')}}" class="nav-link">anggota</a></li>
                    <li><a href="{{url ('#petugas')}}" class="nav-link">petugas</a></li>
                    <li><a href="{{url ('#pinjam')}}" class="nav-link">pinjam</a></li>
                    <li><a href="{{url ('#detailpeminjaman')}}" class="nav-link">detail peminjaman</a></li>
                   --}}
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div> 
    
            
      <div class="main-panel">
        <div class="content-wrapper">
            @yield('content')
        </div>
      </div>
    
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-9">
                <h3 class="my-0 site-logo"><img src="{{url('images')}}/kongkam.jpeg" width="100%" height="150px">
                <h3 class="footer-heading mb-4">Tentang Kami</h3>
                <p>Perpustakaan adalah sebuah tempat yang digunakan untuk menyimpan informasi baik berupa cetak (buku, koran, jurnal, majalah, karya tulis, karya lukisan)</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 ml-auto">
           
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigation</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="{{url ('dashboard')}}">Dashboard</a></li>
                  <li><a href="{{url ('home')}}">Home</a></li>
                  <li><a href="{{url ('buku')}}">Buku</a></li>
                  <li><a href="{{url ('anggota')}}">Anggota</a></li>
                  <li><a href="{{url ('petugas')}}">Petugas</a></li>
                  <li><a href="{{url ('pinjam')}}" >Peminjaman</a></li>
                  <li><a href="{{url ('logout')}}">Logout</a></li>
                </ul>
              </div>
              
            </div>
            
          </div>
          

          <div class="col-lg-4 mb-5 mb-lg-0" id="contact-section">

            <div class="mb-5">
              <h3 class="footer-heading mb-4">hubungi kami</h3>
              <form method="post" class="form-subscribe">
                <div class="form-group mb-3">
                  <input type="text" class="form-control border-white text-white bg-transparent" placeholder="Name" aria-label="Enter Email" aria-describedby="button-addon2">
                </div>
                <div class="form-group mb-3">
                  <input type="text" class="form-control border-white text-white bg-transparent" placeholder="Enter email" aria-label="Enter Email" aria-describedby="button-addon2">
                </div>
                <div class="form-group mb-3">
                  <textarea name="" class="form-control" id="" cols="30" rows="4" placeholder="Your message"></textarea>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary px-5" type="submit">Send Message</button>
                </div>
              </form>

            </div>

          </div>
          
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="mb-4">
                  <a href="{{url ('facebook')}}" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="{{url ('twitter')}}" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="{{url ('instagram')}}" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="{{url ('linkedin')}}" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                </div>
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/stickyfill.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/main.js"></script>
  <script src="{{('js/dashboard.js')}}"></script>
     
  </body>
</html>
<!-- END .site-navbar-wrap -->
    {{-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
      <a class="dropdown-item">
        <i class="mdi mdi-settings text-primary"></i>
        Settings
      </a>
      <a class="dropdown-item">
        <i class="mdi mdi-logout text-primary"></i>
        Logout
      </a>
      <!-- Authentication --> --}}