@include('layouts.front-header')

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">
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
    @include('layouts.navbar')
    @yield('content')
    @include('layouts.front-footer')
  </div>
  <!-- .site-wrap -->


  <!-- loader -->
  

  <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('js/jquery-ui.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('js/aos.js')}}"></script>
  <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('js/jquery.sticky.js')}}"></script>
  <script src="{{asset('js/jquery.mb.YTPlayer.min.js')}}"></script>




  <script src="{{asset('js/main.js')}}"></script>
  <script>
    $(document).ready(function () {
        $('.form-select').selectize({
            sortField: 'text'
        });
    });
  </script>
</body>

</html>