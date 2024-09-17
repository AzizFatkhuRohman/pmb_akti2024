@extends('layouts.in.app')
@section('content')
<div class="container">
    @if (!$ayah || !$ibu || !$wali)
    <div class="alert alert-warning" role="alert">
        Lengkapi data diri anda terlebih dahulu data diri!
    </div>
    @else
    <div class="alert alert-primary" role="alert">
        Selamat datang {{Auth::user()->nama}} di website Penerimaan Mahasiswa Baru AKTI!
    </div>
    @endif
    <div class="row">
        <!-- Sales Card -->
        <div class="col-xxl-6 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Jalur Pendaftaran</h5>

                    <div class="d-flex align-items-center">
                        <div class="ps-3">
                            <h6>{{$jalur}}</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-6 col-md-6">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">Data Diri</h5>

                    <div class="d-flex align-items-center">

                        <div class="ps-3">
                            @if (!$ayah && !$ibu && !$wali)
                            <h6>0%</h6>
                            @elseif(!$ibu && !$wali)
                            <h6>33.3%</h6>
                            @elseif(!$wali)
                            <h6>66.6%</h6>
                            @else
                            <h6>100%</h6>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
    </div>
    <h5 class="mb-3">Pengumuman Terbaru</h5>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pendaftaran Jalur Prestasi dan Rekomendasi SMK Binaan</h5>
            <p class="card-text">Pendaftaran dibuka pada 17 September 2024</p>
            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
        </div>
    </div>
</div>
@endsection