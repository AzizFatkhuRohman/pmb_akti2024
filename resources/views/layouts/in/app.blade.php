@include('layouts.in.head')

<body>

  <!-- ======= Header ======= -->
  @include('layouts.in.side')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>{{$title}}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">{{$title}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <script>
      @if(session('sukses'))
              Swal.fire({
                  title: 'Success!',
                  text: '{{ session('sukses') }}',
                  icon: 'success',
                  confirmButtonText: 'OK'
              });
          @endif
    </script>
    <script>
      @if(session('gagal'))
              Swal.fire({
                  title: 'Failed!',
                  text: '{{ session('gagal') }}',
                  icon: 'error',
                  confirmButtonText: 'OK'
              });
          @endif
    </script>
    @yield('content')

  </main><!-- End #main -->

  @include('layouts.in.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('public/assets/js/main.js')}}"></script>
  <script>
    $(document).ready(function () {
        $('.form-select').selectize({
            sortField: 'text'
        });
    });
  </script>

</body>

</html>