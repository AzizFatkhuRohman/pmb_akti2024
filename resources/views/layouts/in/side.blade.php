<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <span class="d-none d-lg-block">PMB AKTI</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->



  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->nama}}</span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>{{Auth::user()->nama}}</h6>
            <span>{{Auth::user()->email}}</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    @if (Auth::user()->role === 'mahasiswa')
    <li class="nav-item">
      <a class="nav-link {{ $title == 'Dashboard' ? '' : 'collapsed' }}" href="{{url('mahasiswa/dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link {{ $title == 'Data Calon Mahasiswa' || $title == 'Data Pendidikan' || $title == 'Data Keluarga' ? '' : 'collapsed' }}"
        data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Data Diri</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{url('mahasiswa/data-calon-mahasiswa')}}">
            <i class="bi bi-circle"></i><span>Data Calon Mahasiswa</span>
          </a>
        </li>
        <li>
          <a href="{{url('mahasiswa/data-pendidikan')}}">
            <i class="bi bi-circle"></i><span>Data Pendidikan</span>
          </a>
        </li>
        <li>
          <a href="{{url('mahasiswa/data-keluarga')}}">
            <i class="bi bi-circle"></i><span>Data Keluarga</span>
          </a>
        </li>
      </ul>
    </li><!-- End Components Nav -->
    <li class="nav-item">
      <a class="nav-link {{ $title == 'Pengumuman' ? '' : 'collapsed' }}" href="{{url('mahasiswa/pengumuman')}}">
        <i class="bi bi-newspaper"></i>
        <span>Pengumuman</span>
      </a>
    </li>
    @else
    <li class="nav-item">
      <a class="nav-link {{ $title == 'Dashboard' ? '' : 'collapsed' }}" href="{{url('admin/dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ $title == 'Data Calon Mahasiswa' ? '' : 'collapsed' }}"
        href="{{url('admin/data-calon-mahasiswa')}}">
        <i class="bi bi-people-fill"></i>
        <span>Data Calon Mahasiswa</span>
      </a>
    </li>
    @endif

  </ul>

</aside><!-- End Sidebar-->