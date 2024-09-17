@extends('layouts.in.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Data Pendidikan</h5>

            <!-- General Form Elements -->
            <form action="{{url('mahasiswa/data-pendidikan/'.$data->id)}}" enctype="multipart/form-data" method="POST">
                @method('put')
                @csrf
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Sekolah Dasar</label>
                    <div class="col-sm-10 row">
                        <div class="col-6">
                            <input type="text" class="form-control" name="nama_sd" placeholder="Nama Sekolah" value="{{$data->nama_sd}}">
                            @error('nama_sd')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="number" class="form-control" name="masuk_sd" id="" placeholder="Tahun Masuk" value="{{$data->tahun_sd}}">
                            @error('masuk_sd')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="kota_sd" placeholder="Kota" value="{{$data->kota_sd}}">
                            @error('kota_sd')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="number" class="form-control" name="lulus_sd" id="" placeholder="Tahun Lulus" value="{{$data->lulus_sd}}">
                            @error('lulus_sd')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Sekolah Menengah Pertama</label>
                    <div class="col-sm-10 row">
                        <div class="col-6">
                            <input type="text" class="form-control" name="nama_smp" placeholder="Nama Sekolah" value="{{$data->nama_smp}}">
                            @error('nama_smp')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="number" class="form-control" name="masuk_smp" id="" placeholder="Tahun Masuk" value="{{$data->tahun_smp}}">
                            @error('masuk_smp')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="kota_smp" placeholder="Kota" value="{{$data->kota_smp}}">
                            @error('kota_smp')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="number" class="form-control" name="lulus_smp" id="" placeholder="Tahun Lulus" value="{{$data->lulus_smp}}">
                            @error('lulus_smp')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Sekolah Menengah Kejuruan</label>
                    <div class="col-sm-10 row">
                        <div class="col-6">
                            <input type="text" class="form-control" name="nama_smk" placeholder="Nama Sekolah" value="{{$data->nama_smk}}">
                            @error('nama_smk')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="number" class="form-control" name="masuk_smk" id="" placeholder="Tahun Masuk" value="{{$data->tahun_smk}}">
                            @error('masuk_smk')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="kota_smk" placeholder="Kota" value="{{$data->kota_smk}}">
                            @error('kota_smk')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="number" class="form-control" name="lulus_smk" id="" placeholder="Tahun Lulus" value="{{$data->lulus_smk}}">
                            @error('lulus_smk')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="jurusan" id="select">
                            <option value="{{$data->jurusan}}">{{$data->jurusan}}</option>
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
                    </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Prestasi Akademik</label>
                    <div class="col-sm-10 row">
                        <div class="col-6">
                            <select class="form-select" aria-label="Default select example"
                            name="tingkat_prestasi_akademik" id="select">
                            @if ($data->tingkat_prestasi_akademik === null)
                            <option value="">Tingkat</option>
                            @else
                                <option value="{{$data->tingkat_prestasi_akademik}}">{{$data->tingkat_prestasi_akademik}}</option>
                            @endif
                            <option value="Internasional">Internasional</option>
                            <option value="Nasional">Nasional</option>
                            <option value="Provinsi">Provinsi</option>
                            <option value="Kota/Kabupaten">Kota/Kabupaten</option>
                        </select>
                        @error('tingkat_prestasi_akademik')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <input type="text" class="form-control" name="penyelenggara_prestasi_akademik" placeholder="Penyelenggara" value="{{$data->penyelenggara_prestasi_akademik}}">
                        @error('penyelenggara_prestasi_akademik')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="nama_prestasi_akademik" placeholder="Nama Prestasi" value="{{$data->nama_prestasi_akademik}}">
                            @error('nama_prestasi_akademik')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="file" class="form-control" name="bukti_prestasi_akademik"> 
                            <span>Unggah Sertifikat (format:jpg,png,jpeg,pdf)</span>
                            @error('bukti_prestasi_akademik')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Prestasi Non Akademik</label>
                    <div class="col-sm-10 row">
                        <div class="col-6">
                            <select class="form-select" aria-label="Default select example"
                            name="tingkat_prestasi_non_akademik" id="select">
                            @if ($data->tingkat_prestasi_non_akademik === null)
                            <option value="">Tingkat</option>
                            @else
                                <option value="{{$data->tingkat_prestasi_non_akademik}}">{{$data->tingkat_prestasi_non_akademik}}</option>
                            @endif
                            <option value="Internasional">Internasional</option>
                            <option value="Nasional">Nasional</option>
                            <option value="Provinsi">Provinsi</option>
                            <option value="Kota/Kabupaten">Kota/Kabupaten</option>
                        </select>
                        <input type="text" class="form-control" name="penyelenggara_prestasi_non_akademik" placeholder="Penyelenggara" value="{{$data->penyelenggara_prestasi_non_akademik}}">
                        @error('penyelenggara_prestasi_non_akademik')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="nama_prestasi_non_akademik" placeholder="Nama Prestasi" value="{{$data->nama_prestasi_non_akademik}}">
                            @error('nama_prestasi_non_akademik')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="file" class="form-control" name="bukti_prestasi_non_akademik">
                            <span>Unggah Sertifikat (format:jpg,png,jpeg,pdf)</span>
                            @error('bukti_prestasi_non_akademik')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Sekolah dibiayai oleh?</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="biaya_sekolah" placeholder="Orang tua, Kakak, Kerabat, Beasiswa, atau Mandiri" value="{{$data->sekolah_dibiayai_oleh}}">
                        @error('biaya_sekolah')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Raport Semester 1</label>
                    <div class="col-sm-10 row">
                        <div class="col-6">
                            <input type="number" class="form-control" name="matematika_smt_satu" placeholder="Nilai Matematika" value="{{$data->smt_1_matematika}}">
                            @error('matematika_smt_satu')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="number" class="form-control" name="indonesia_smt_satu" placeholder="Nilai Bahasa Indonesia" value="{{$data->smt_1_indonesia}}">
                            @error('indonesia_smt_satu')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="number" class="form-control" name="inggris_smt_satu" placeholder="Nilai Bahasa Inggris" value="{{$data->smt_1_inggris}}">
                            @error('inggris_smt_satu')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="file" class="form-control" name="raport_satu">
                            @error('raport_satu')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span>Unggah Raport (format:jpg,png,jpeg,pdf)</span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Raport Semester 2</label>
                    <div class="col-sm-10 row">
                        <div class="col-6">
                            <input type="number" class="form-control" name="matematika_smt_dua" placeholder="Nilai Matematika" value="{{$data->smt_2_matematika}}">
                            @error('matematika_smt_dua')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="number" class="form-control" name="indonesia_smt_dua" placeholder="Nilai Bahasa Indonesia" value="{{$data->smt_2_indonesia}}">
                            @error('indonesia_smt_dua')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="number" class="form-control" name="inggris_smt_dua" placeholder="Nilai Bahasa Inggris" value="{{$data->smt_2_inggris}}">
                            @error('inggris_smt_dua')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="file" class="form-control" name="raport_dua">
                            @error('raport_dua')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span>Unggah Raport (format:jpg,png,jpeg,pdf)</span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Raport Semester 3</label>
                    <div class="col-sm-10 row">
                        <div class="col-6">
                            <input type="number" class="form-control" name="matematika_smt_tiga" placeholder="Nilai Matematika" value="{{$data->smt_3_matematika}}">
                            @error('matematika_smt_tiga')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="number" class="form-control" name="indonesia_smt_tiga" placeholder="Nilai Bahasa Indonesia" value="{{$data->smt_3_indonesia}}">
                            @error('indonesia_smt_tiga')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="number" class="form-control" name="inggris_smt_tiga" placeholder="Nilai Bahasa Inggris" value="{{$data->smt_3_inggris}}">
                            @error('inggris_smt_tiga')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="file" class="form-control" name="raport_tiga">
                            @error('raport_tiga')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span>Unggah Raport (format:jpg,png,jpeg,pdf)</span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Raport Semester 4</label>
                    <div class="col-sm-10 row">
                        <div class="col-6">
                            <input type="number" class="form-control" name="matematika_smt_empat" placeholder="Nilai Matematika" value="{{$data->smt_4_matematika}}">
                            @error('matematika_smt_empat')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="number" class="form-control" name="indonesia_smt_empat" placeholder="Nilai Bahasa Indonesia" value="{{$data->smt_4_indonesia}}">
                            @error('indonesia_smt_empat')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="number" class="form-control" name="inggris_smt_empat" placeholder="Nilai Bahasa Inggris" value="{{$data->smt_4_inggris}}">
                            @error('inggris_smt_empat')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="file" class="form-control" name="raport_empat">
                            @error('raport_empat')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span>Unggah Raport (format:jpg,png,jpeg,pdf)</span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Raport Semester 5 (Opsional)</label>
                    <div class="col-sm-10 row">
                        <div class="col-6">
                            <input type="number" class="form-control" name="matematika_smt_lima" placeholder="Nilai Matematika" value="{{$data->smt_5_matematika}}">
                            @error('matematika_smt_lima')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="number" class="form-control" name="indonesia_smt_lima" placeholder="Nilai Bahasa Indonesia" value="{{$data->smt_5_indonesia}}">
                            @error('indonesia_smt_lima')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="number" class="form-control" name="inggris_smt_lima" placeholder="Nilai Bahasa Inggris" value="{{$data->smt_5_inggris}}">
                            @error('inggris_smt_lima')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="file" class="form-control" name="raport_lima">
                            @error('raport_lima')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span>Unggah Raport (format:jpg,png,jpeg,pdf)</span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form><!-- End General Form Elements -->

        </div>
    </div>
</div>

@endsection