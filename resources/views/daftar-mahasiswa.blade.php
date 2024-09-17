@extends('layouts.front-app')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
  <div class="container">
    <div class="row align-items-end justify-content-center text-center">
      <div class="col-lg-7">
        <h2 class="mb-0">{{$title}}</h2>
        <p>Daftarkan dirimu!</p>
      </div>
    </div>
  </div>
</div>


<div class="custom-breadcrumns border-bottom">
  <div class="container">
    <a href="{{url('/')}}">Home</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <span class="current">{{$title}}</span>
  </div>
</div>

<div class="site-section">

  <form action="{{url('daftar-mahasiswa')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
      <div class="row">
        <div class="col-6">
          <label for="inputNIK" class="form-label">NIK</label>
          <input type="number" class="form-control" name="nik">
          @error('nik')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="col-6">
          <label for="inputEmail4" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" name="nama_lengkap">
          @error('nama_lengkap')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="col-6">
          <label for="inputEmail4" class="form-label">Pilih Jalur Pendaftaran</label>
          <select class="form-control" aria-label="Default select example" name="jalur_daftar" id="jalur_daftar">
            <option value="Prestasi">Prestasi</option>
            <option value="Rekomendasi SMK Binaan">Rekomendasi SMK Binaan</option>
          </select>
          @error('jalur_daftar')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="col-6">
          <label for="inputEmail4" class="form-label">Sertifikat Prestasi</label>
          <input type="file" class="form-control" name="bukti_file_prestasi" id="prestasi">
          @error('bukti_file_prestasi')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="col-6">
          <label for="inputEmail4" class="form-label">Surat Rekomendasi</label>
          <input type="file" class="form-control" name="bukti_file_rekomendasi" id="rekomendasi">
          @error('bukti_file_rekomendasi')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="col-6">
          <label for="inputEmail4" class="form-label">Jurusan Sekolah</label>
          <select class="form-control" aria-label="Default select example" name="jurusan" id="select">
            <option value="Teknik Gambar Mesin">Teknik Gambar Mesin</option>
            <option value="Instrumentasi dan Otomatisasi Proses">Instrumentasi dan Otomatisasi Proses</option>
            <option value="Manajemen Logistik">Manajemen Logistik</option>
            <option value="Sistem Informasi, Jaringan, dan Aplikasi">Sistem Informasi, Jaringan, dan Aplikasi</option>
            <option value="Teknik Bodi Kendaraan Ringan">Teknik Bodi Kendaraan Ringan</option>
            <option value="Teknik Elektronika Komunikasi">Teknik Elektronika Komunikasi</option>
            <option value="Teknik Fabrikasi Logam dan Manufaktur">Teknik Fabrikasi Logam dan Manufaktur</option>
            <option value="Teknik Jaringan Akses Telekomunikasi">Teknik Jaringan Akses Telekomunikasi</option>
            <option value="Teknik Jaringan Tenaga Listrik">Teknik Jaringan Tenaga Listrik</option>
            <option value="Teknik Logistik">Teknik Logistik</option>
            <option value="Teknik Pengecoran Logam">Teknik Pengecoran Logam</option>
            <option value="Teknik Pengendalian Produksi">Teknik Pengendalian Produksi</option>
            <option value="Teknik Sepeda Motor">Teknik Sepeda Motor</option>
            <option value="Teknik Transmisi Telekomunikasi">Teknik Transmisi Telekomunikasi</option>
            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
            <option value="Teknik Alat Berat">Teknik Alat Berat</option>
            <option value="Teknik Elektronika Industri">Teknik Elektronika Industri</option>
            <option value="Teknik Instalasi Tenaga Listrik">Teknik Instalasi Tenaga Listrik</option>
            <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
            <option value="Teknik Mekanik Industri">Teknik Mekanik Industri</option>
            <option value="Teknik Mekatronika">Teknik Mekatronika</option>
            <option value="Teknik Otomasi Industri">Teknik Otomasi Industri</option>
            <option value="Teknik Ototronik">Teknik Ototronik</option>
            <option value="Teknik Pembangkit Tenaga Listrik">Teknik Pembangkit Tenaga Listrik</option>
            <option value="Teknik Pemesinan">Teknik Pemesinan</option>
            <option value="Teknik Pengelasan">Teknik Pengelasan</option>
          </select>
          @error('jurusan')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="col-6">
          <label for="inputEmail4" class="form-label">Provinsi</label>
          <input type="text" class="form-control" name="provinsi">
          @error('provinsi')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="col-6">
          <label for="inputEmail4" class="form-label">No Telp</label>
          <input type="number" class="form-control" name="no_telp">
          @error('no_telp')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="col-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" class="form-control" name="email">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="col-6">
          <label for="inputEmail4" class="form-label">Password</label>
          <input type="password" class="form-control" name="password">
          @error('password')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="col-6">
          <label for="inputEmail4" class="form-label">Konfirmasi Password</label>
          <input type="password" class="form-control" name="password_confirmation">
        </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </form>
</div>
<script>
  function toggleFields() {
      var selectedOption = document.getElementById("jalur_daftar").value;
      var prestasiField = document.getElementById("prestasi").parentElement;
      var rekomendasiField = document.getElementById("rekomendasi").parentElement;
      
      if (selectedOption === "Prestasi") {
          prestasiField.style.display = "block";
          rekomendasiField.style.display = "none";
      } else if (selectedOption === "Rekomendasi SMK Binaan") {
          prestasiField.style.display = "none";
          rekomendasiField.style.display = "block";
      } else {
          prestasiField.style.display = "none";
          rekomendasiField.style.display = "none";
      }
  }

  window.onload = function() {
      toggleFields();  // Set default visibility based on the initial selection
      document.getElementById("jalur_daftar").addEventListener("change", toggleFields);
  };
</script>
@endsection