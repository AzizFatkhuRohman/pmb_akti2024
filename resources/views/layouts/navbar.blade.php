<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>


  <div class="py-2 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-9 d-none d-lg-block"> 
          <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> (0267) 644840</a> 
          <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> tia.admin@toyota.co.id</a> 
        </div>
        <div class="col-lg-3 text-right">
          <a href="{{url('login')}}" class="small mr-3"><span class="icon-unlock-alt"></span> Log In</a>
          <a href="{{url('daftar-mahasiswa')}}" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Daftar</a>
        </div>
      </div>
    </div>
  </div>
  <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

    <div class="container">
      <div class="d-flex align-items-center">
        <div class="site-logo">
          <a href="index.html" class="d-block">
            <img src="https://upm.akti.ac.id/wp-content/uploads/2020/02/logo-min.png" alt="Image" class="img-fluid" width="250">
          </a>
        </div>
        <div class="mr-auto">
          <nav class="site-navigation position-relative text-right" role="navigation">
            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
              <li class="{{ $title == 'Home' ? 'active' : '' }}">
                <a href="{{url('/')}}" class="nav-link text-left">Beranda</a>
              </li>
              <li class="{{ $title == 'Pengumuman' ? 'active' : '' }}">
                <a href="" class="nav-link text-left">Pengumuman</a>
              </li>
              <li class="{{ $title == 'Profil' ? 'active' : '' }}">
                <a href="" class="nav-link text-left">Profil</a>
              </li>
              <li class="{{ $title == 'Kontak' ? 'active' : '' }}">
                  <a href="{{url('kontak')}}" class="nav-link text-left">Kontak</a>
                </li>
            </ul>                                                                                                                                                                                                                                                                                          </ul>
          </nav>

        </div>
        <div class="ml-auto">
          <div class="social-wrap">
            <a href="https://web.facebook.com/ToyotaIndonesiaAcademy/"><span class="icon-facebook"></span></a>
            <a href="https://www.instagram.com/akti_id"><span class="icon-instagram"></span></a>

            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
              class="icon-menu h3"></span></a>
          </div>
        </div>
       
      </div>
    </div>

  </header>