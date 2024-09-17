@extends('layouts.in.app')
@section('content')
<div class="card">
    <div class="card-body pt-3">
        <!-- Bordered Tabs -->
        <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profil
                    Ayah</button>
            </li>

            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Profil Ibu</button>
            </li>

            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Profil Wali</button>
            </li>

            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Profil
                    Saudara</button>
            </li>

        </ul>
        <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <form action="{{ $ayah ? url('mahasiswa/data-ayah/'.$ayah->id) : url('mahasiswa/data-ayah') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($ayah)
                    @method('PUT')
                    @endif

                    <!-- No KTP -->
                    <div class="mb-3">
                        <label for="noKTP" class="form-label">No KTP</label>
                        <input type="text" class="form-control" id="noKTP" name="no_ktp_ayah"
                            value="{{ old('no_ktp_ayah', $ayah->no_ktp_ayah ?? '') }}">
                        @error('no_ktp_ayah')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status and Nama -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="statusAyah" class="form-label">Status</label>
                            <select class="form-select" name="status_ayah" id="statusAyah">
                                <option value="" disabled selected>{{ $ayah->status_ayah ?? '--Pilih Status--' }}
                                </option>
                                <option value="Ayah Kandung" {{ (old('status_ayah')=='Ayah Kandung' || (isset($ayah) &&
                                    $ayah->status_ayah == 'Ayah Kandung')) ? 'selected' : '' }}>Ayah Kandung</option>
                                <option value="Ayah Tiri" {{ (old('status_ayah')=='Ayah Tiri' || (isset($ayah) &&
                                    $ayah->status_ayah == 'Ayah Tiri')) ? 'selected' : '' }}>Ayah Tiri</option>
                                <option value="Ayah Angkat" {{ (old('status_ayah')=='Ayah Angkat' || (isset($ayah) &&
                                    $ayah->status_ayah == 'Ayah Angkat')) ? 'selected' : '' }}>Ayah Angkat</option>
                            </select>
                            @error('status_ayah')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="namaAyah" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="namaAyah" name="nama_ayah"
                                value="{{ old('nama_ayah', $ayah->nama_ayah ?? '') }}">
                            @error('nama_ayah')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Tempat & Tanggal Lahir -->
                    <div class="row">
                        <div class="col-6">
                            <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempatLahir" name="tempat_lahir_ayah"
                                value="{{ old('tempat_lahir_ayah', $ayah->tempat_lahir ?? '') }}">
                            @error('tempat_lahir_ayah')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggalLahir" name="tanggal_lahir_ayah"
                                value="{{ old('tanggal_lahir_ayah', $ayah->tanggal_lahir ?? '') }}">
                            @error('tanggal_lahir_ayah')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Pendidikan, Pekerjaan -->
                    <div class="row">
                        <div class="col-3">
                            <label for="pendidikanAyah" class="form-label">Pendidikan Terakhir</label>
                            <select class="form-select" name="pendidikan_ayah" id="pendidikanAyah">
                                <option value="" disabled selected>{{ $ayah->pendidikan_terakhir ?? '--Pilih
                                    Pendidikan--' }}</option>
                                <option value="SD" {{ (old('pendidikan_ayah')=='SD' || (isset($ayah) && $ayah->
                                    pendidikan_terakhir == 'SD')) ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ (old('pendidikan_ayah')=='SMP' || (isset($ayah) && $ayah->
                                    pendidikan_terakhir == 'SMP')) ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ (old('pendidikan_ayah')=='SMA' || (isset($ayah) && $ayah->
                                    pendidikan_terakhir == 'SMA')) ? 'selected' : '' }}>SMA</option>
                                <option value="DIPLOMA" {{ (old('pendidikan_ayah')=='DIPLOMA' || (isset($ayah) &&
                                    $ayah->pendidikan_terakhir == 'DIPLOMA')) ? 'selected' : '' }}>DIPLOMA</option>
                                <option value="S1" {{ (old('pendidikan_ayah')=='S1' || (isset($ayah) && $ayah->
                                    pendidikan_terakhir == 'S1')) ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ (old('pendidikan_ayah')=='S2' || (isset($ayah) && $ayah->
                                    pendidikan_terakhir == 'S2')) ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ (old('pendidikan_ayah')=='S3' || (isset($ayah) && $ayah->
                                    pendidikan_terakhir == 'S3')) ? 'selected' : '' }}>S3</option>
                            </select>
                            @error('pendidikan_ayah')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="pekerjaanAyah" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaanAyah" name="pekerjaan_ayah"
                                value="{{ old('pekerjaan_ayah', $ayah->pekerjaan ?? '') }}">
                            @error('pekerjaan_ayah')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Penghasilan Bulanan -->
                    <div class="mb-3">
                        <label for="penghasilanBulanan" class="form-label">Penghasilan Bulanan</label>
                        <input type="number" class="form-control" id="penghasilanBulanan" name="penghasilan_bulanan"
                            value="{{ old('penghasilan_bulanan', $ayah->penghasilan_bulanan ?? '') }}">
                        @error('penghasilan_bulanan')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status Pernikahan -->
                    <div class="mb-3">
                        <label for="statusPernikahan" class="form-label">Status Pernikahan</label>
                        <select class="form-select" name="status_pernikahan" id="statusAyah">
                            <option value="" disabled selected>{{ $ayah->status_pernikahan ?? '--Pilih Status--' }}
                            </option>
                            <option value="Menikah" {{ (old('status_pernikahan')=='Menikah' || (isset($ayah) && $ayah->
                                status_pernikahan == 'Menikah')) ? 'selected' : '' }}>Menikah</option>
                            <option value="Duda" {{ (old('status_pernikahan')=='Duda' || (isset($ayah) && $ayah->
                                status_pernikahan == 'Duda')) ? 'selected' : '' }}>Duda</option>
                        </select>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="{{ old('alamat', $ayah->alamat ?? '') }}">
                        @error('alamat')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- No Rumah, RT, RW, Kode Pos -->
                    <div class="row">
                        <div class="col-3">
                            <label for="noRumah" class="form-label">No Rumah</label>
                            <input type="text" class="form-control" id="noRumah" name="no_rumah"
                                value="{{ old('no_rumah', $ayah->no_rumah ?? '') }}">
                            @error('no_rumah')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="rt" class="form-label">RT</label>
                            <input type="text" class="form-control" id="rt" name="rt"
                                value="{{ old('rt', $ayah->rt ?? '') }}">
                            @error('rt')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="rw" class="form-label">RW</label>
                            <input type="text" class="form-control" id="rw" name="rw"
                                value="{{ old('rw', $ayah->rw ?? '') }}">
                            @error('rw')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="kodePos" class="form-label">Kode Pos</label>
                            <input type="text" class="form-control" id="kodePos" name="kode_pos"
                                value="{{ old('kode_pos', $ayah->kode_pos ?? '') }}">
                            @error('kode_pos')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Provinsi, Kota, Kecamatan, Desa -->
                    <div class="row">
                        <div class="col-3">
                            <label for="provinsi" class="form-label">Provinsi</label>
                            <input type="text" class="form-control" id="provinsi" name="provinsi"
                                value="{{ old('provinsi', $ayah->provinsi ?? '') }}">
                            @error('provinsi')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="kota" class="form-label">Kota</label>
                            <input type="text" class="form-control" id="kota" name="kota"
                                value="{{ old('kota', $ayah->kota ?? '') }}">
                            @error('kota')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                value="{{ old('kecamatan', $ayah->kecamatan ?? '') }}">
                            @error('kecamatan')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="desa" class="form-label">Desa</label>
                            <input type="text" class="form-control" id="desa" name="desa"
                                value="{{ old('desa', $ayah->desa ?? '') }}">
                            @error('desa')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- No Telp & Email -->
                    <div class="row">
                        <div class="col-6">
                            <label for="noTelp" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="noTelp" name="no_telp"
                                value="{{ old('no_telp', $ayah->no_telp ?? '') }}">
                            @error('no_telp')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $ayah->email ?? '') }}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- File Uploads -->
                    <div class="row mb-3">
                        @if ($ayah)
                        <div class="col-6">
                            <img src="..." class="img-thumbnail" alt="...">
                        </div>
                        <div class="col-6">
                            <img src="..." class="img-thumbnail" alt="...">
                        </div>
                        @else
                        <div class="col-6">
                            <label for="photoAyah" class="form-label">Photo Ayah</label>
                            <input type="file" class="form-control" id="photoAyah" name="photo_ayah">
                            @error('photo_ayah')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="ktpAyah" class="form-label">KTP Ayah</label>
                            <input type="file" class="form-control" id="ktpAyah" name="ktp_ayah">
                            @error('ktp_ayah')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                <form action="{{ $ibu ? url('mahasiswa/data-ibu/'.$ibu->id) : url('mahasiswa/data-ibu') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($ibu)
                    @method('PUT')
                    @endif

                    <!-- No KTP -->
                    <div class="mb-3">
                        <label for="noKTPIbu" class="form-label">No KTP</label>
                        <input type="text" class="form-control" id="noKTPIbu" name="no_ktp_ibu"
                            value="{{ old('no_ktp_ibu', $ibu->no_ktp_ibu ?? '') }}">
                        @error('no_ktp_ibu')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status and Nama -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="statusIbu" class="form-label">Status</label>
                            <select class="form-select" name="status_ibu" id="statusIbu">
                                <option value="" disabled selected>{{ $ibu->status_ibu ?? '--Pilih Status--' }}</option>
                                <option value="Ibu Kandung" {{ (old('status_ibu')=='Ibu Kandung' || (isset($ibu) &&
                                    $ibu->status_ibu == 'Ibu Kandung')) ? 'selected' : '' }}>Ibu Kandung</option>
                                <option value="Ibu Tiri" {{ (old('status_ibu')=='Ibu Tiri' || (isset($ibu) && $ibu->
                                    status_ibu == 'Ibu Tiri')) ? 'selected' : '' }}>Ibu Tiri</option>
                                <option value="Ibu Angkat" {{ (old('status_ibu')=='Ibu Angkat' || (isset($ibu) && $ibu->
                                    status_ibu == 'Ibu Angkat')) ? 'selected' : '' }}>Ibu Angkat</option>
                            </select>
                            @error('status_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="namaIbu" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="namaIbu" name="nama_ibu"
                                value="{{ old('nama_ibu', $ibu->nama_ibu ?? '') }}">
                            @error('nama_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Tempat & Tanggal Lahir -->
                    <div class="row">
                        <div class="col-6">
                            <label for="tempatLahirIbu" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempatLahirIbu" name="tempat_lahir_ibu"
                                value="{{ old('tempat_lahir_ibu', $ibu->tempat_lahir ?? '') }}">
                            @error('tempat_lahir_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="tanggalLahirIbu" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggalLahirIbu" name="tanggal_lahir_ibu"
                                value="{{ old('tanggal_lahir_ibu', $ibu->tanggal_lahir ?? '') }}">
                            @error('tanggal_lahir_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Pendidikan, Pekerjaan -->
                    <div class="row">
                        <div class="col-3">
                            <label for="pendidikanIbu" class="form-label">Pendidikan Terakhir</label>
                            <select class="form-select" name="pendidikan_ibu" id="pendidikanIbu">
                                <option value="SD" {{ (old('pendidikan_ibu')=='SD' || (isset($ibu) && $ibu->
                                    pendidikan_ibu == 'SD')) ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ (old('pendidikan_ibu')=='SMP' || (isset($ibu) && $ibu->
                                    pendidikan_ibu == 'SMP')) ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ (old('pendidikan_ibu')=='SMA' || (isset($ibu) && $ibu->
                                    pendidikan_ibu == 'SMA')) ? 'selected' : '' }}>SMA</option>
                                <option value="DIPLOMA" {{ (old('pendidikan_ibu')=='DIPLOMA' || (isset($ibu) && $ibu->
                                    pendidikan_ibu == 'DIPLOMA')) ? 'selected' : '' }}>DIPLOMA</option>
                                <option value="S1" {{ (old('pendidikan_ibu')=='S1' || (isset($ibu) && $ibu->
                                    pendidikan_ibu == 'S1')) ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ (old('pendidikan_ibu')=='S2' || (isset($ibu) && $ibu->
                                    pendidikan_ibu == 'S2')) ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ (old('pendidikan_ibu')=='S3' || (isset($ibu) && $ibu->
                                    pendidikan_ibu == 'S3')) ? 'selected' : '' }}>S3</option>
                            </select>
                            @error('pendidikan_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="pekerjaanIbu" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaanIbu" name="pekerjaan_ibu"
                                value="{{ old('pekerjaan_ibu', $ibu->pekerjaan ?? '') }}">
                            @error('pekerjaan_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Penghasilan Bulanan -->
                    <div class="mb-3">
                        <label for="penghasilanBulananIbu" class="form-label">Penghasilan Bulanan</label>
                        <input type="number" class="form-control" id="penghasilanBulananIbu"
                            name="penghasilan_bulanan_ibu"
                            value="{{ old('penghasilan_bulanan_ibu', $ibu->penghasilan_bulanan ?? '') }}">
                        @error('penghasilan_bulanan_ibu')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status Pernikahan -->
                    <div class="mb-3">
                        <label for="statusPernikahanIbu" class="form-label">Status Pernikahan</label>
                        <select class="form-select" name="status_pernikahan_ibu" id="statusAyah">
                            <option value="" disabled selected>{{ $ibu->status_pernikahan ?? '--Pilih Status--' }}
                            </option>
                            <option value="Menikah" {{ (old('status_pernikahan')=='Menikah' || (isset($ibu) && $ibu->
                                status_pernikahan == 'Menikah')) ? 'selected' : '' }}>Menikah</option>
                            <option value="Duda" {{ (old('status_pernikahan')=='Duda' || (isset($ibu) && $ibu->
                                status_pernikahan == 'Janda')) ? 'selected' : '' }}>Janda</option>
                        </select>
                        @error('status_pernikahan_ibu')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamatIbu" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamatIbu" name="alamat_ibu"
                            value="{{ old('alamat_ibu', $ibu->alamat ?? '') }}">
                        @error('alamat_ibu')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- No Rumah, RT, RW, Kode Pos -->
                    <div class="row">
                        <div class="col-3">
                            <label for="noRumahIbu" class="form-label">No Rumah</label>
                            <input type="text" class="form-control" id="noRumahIbu" name="no_rumah_ibu"
                                value="{{ old('no_rumah_ibu', $ibu->no_rumah ?? '') }}">
                            @error('no_rumah_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="rtIbu" class="form-label">RT</label>
                            <input type="text" class="form-control" id="rtIbu" name="rt_ibu"
                                value="{{ old('rt_ibu', $ibu->rt ?? '') }}">
                            @error('rt_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="rwIbu" class="form-label">RW</label>
                            <input type="text" class="form-control" id="rwIbu" name="rw_ibu"
                                value="{{ old('rw_ibu', $ibu->rw?? '') }}">
                            @error('rw_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="kodePosIbu" class="form-label">Kode Pos</label>
                            <input type="text" class="form-control" id="kodePosIbu" name="kode_pos_ibu"
                                value="{{ old('kode_pos_ibu', $ibu->kode_pos ?? '') }}">
                            @error('kode_pos_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Provinsi, Kota, Kecamatan, Desa -->
                    <div class="row">
                        <div class="col-3">
                            <label for="provinsiIbu" class="form-label">Provinsi</label>
                            <input type="text" class="form-control" id="provinsiIbu" name="provinsi_ibu"
                                value="{{ old('provinsi_ibu', $ibu->provinsi ?? '') }}">
                            @error('provinsi_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="kotaIbu" class="form-label">Kota</label>
                            <input type="text" class="form-control" id="kotaIbu" name="kota_ibu"
                                value="{{ old('kota_ibu', $ibu->kota ?? '') }}">
                            @error('kota_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="kecamatanIbu" class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatanIbu" name="kecamatan_ibu"
                                value="{{ old('kecamatan_ibu', $ibu->kecamatan ?? '') }}">
                            @error('kecamatan_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="desaIbu" class="form-label">Desa</label>
                            <input type="text" class="form-control" id="desaIbu" name="desa_ibu"
                                value="{{ old('desa_ibu', $ibu->desa ?? '') }}">
                            @error('desa_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- No Telp & Email -->
                    <div class="row">
                        <div class="col-6">
                            <label for="noTelpIbu" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="noTelpIbu" name="no_telp_ibu"
                                value="{{ old('no_telp_ibu', $ibu->no_telp ?? '') }}">
                            @error('no_telp_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="emailIbu" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailIbu" name="email_ibu"
                                value="{{ old('email_ibu', $ibu->email ?? '') }}">
                            @error('email_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- File Uploads -->
                    <div class="row mb-3">
                        @if ($ibu)
                            <div class="col-6">
                                <img src="..." class="img-thumbnail" alt="...">
                            </div>
                            <div class="col-6">
                                <img src="..." class="img-thumbnail" alt="...">
                            </div>
                        @else
                        <div class="col-6">
                            <label for="photoIbu" class="form-label">Photo Ibu</label>
                            <input type="file" class="form-control" id="photoIbu" name="photo_ibu">
                            @error('photo_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="ktpIbu" class="form-label">KTP Ibu</label>
                            <input type="file" class="form-control" id="ktpIbu" name="ktp_ibu">
                            @error('ktp_ibu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

            <div class="tab-pane fade pt-3" id="profile-settings">
                <form action="{{ $wali ? url('mahasiswa/data-wali/'.$wali->id) : url('mahasiswa/data-wali') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($wali)
                    @method('PUT')
                    @endif

                    <!-- No KTP -->
                    <div class="mb-3">
                        <label for="noKTPWali" class="form-label">No KTP</label>
                        <input type="text" class="form-control" id="noKTPWali" name="no_ktp_wali"
                            value="{{ old('no_ktp_wali', $wali->no_ktp_wali ?? '') }}">
                        @error('no_ktp_wali')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status and Nama -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="statusWali" class="form-label">Status</label>
                            <select class="form-select" name="status_wali" id="statusWali">
                                <option value="Hidup" {{ (old('status_wali')=='Hidup' || (isset($wali) && $wali->
                                    status_wali == 'Hidup')) ? 'selected' : '' }}>Hidup</option>
                                <option value="Wafat" {{ (old('status_wali')=='Wafat' || (isset($wali) && $wali->
                                    status_wali == 'Wafat')) ? 'selected' : '' }}>Wafat</option>
                            </select>
                            @error('status_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="namaWali" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="namaWali" name="nama_wali"
                                value="{{ old('nama_wali', $wali->nama_wali ?? '') }}">
                            @error('nama_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Tempat & Tanggal Lahir -->
                    <div class="row">
                        <div class="col-6">
                            <label for="tempatLahirWali" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempatLahirWali" name="tempat_lahir_wali"
                                value="{{ old('tempat_lahir_wali', $wali->tempat_lahir ?? '') }}">
                            @error('tempat_lahir_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="tanggalLahirWali" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggalLahirWali" name="tanggal_lahir_wali"
                                value="{{ old('tanggal_lahir_wali', $wali->tanggal_lahir ?? '') }}">
                            @error('tanggal_lahir_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Pendidikan, Pekerjaan -->
                    <div class="row">
                        <div class="col-3">
                            <label for="pendidikanWali" class="form-label">Pendidikan Terakhir</label>
                            <select class="form-select" name="pendidikan_wali" id="pendidikanWali">
                                <option value="" disabled selected>{{ $wali->pendidikan_terakhir ?? '--Pilih
                                    Pendidikan--'
                                    }}</option>
                                <option value="SD" {{ (old('pendidikan_wali')=='SD' || (isset($wali) && $wali->
                                    pendidikan_wali == 'SD')) ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ (old('pendidikan_wali')=='SMP' || (isset($wali) && $wali->
                                    pendidikan_wali == 'SMP')) ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ (old('pendidikan_wali')=='SMA' || (isset($wali) && $wali->
                                    pendidikan_wali == 'SMA')) ? 'selected' : '' }}>SMA</option>
                                <option value="DIPLOMA" {{ (old('pendidikan_wali')=='DIPLOMA' || (isset($wali) &&
                                    $wali->pendidikan_wali == 'DIPLOMA')) ? 'selected' : '' }}>DIPLOMA</option>
                                <option value="S1" {{ (old('pendidikan_wali')=='S1' || (isset($wali) && $wali->
                                    pendidikan_wali == 'S1')) ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ (old('pendidikan_wali')=='S2' || (isset($wali) && $wali->
                                    pendidikan_wali == 'S2')) ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ (old('pendidikan_wali')=='S3' || (isset($wali) && $wali->
                                    pendidikan_wali == 'S3')) ? 'selected' : '' }}>S3</option>
                            </select>
                            @error('pendidikan_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="pekerjaanWali" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaanWali" name="pekerjaan_wali"
                                value="{{ old('pekerjaan_wali', $wali->pekerjaan ?? '') }}">
                            @error('pekerjaan_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Penghasilan Bulanan -->
                    <div class="mb-3">
                        <label for="penghasilanBulananWali" class="form-label">Penghasilan Bulanan</label>
                        <input type="number" class="form-control" id="penghasilanBulananWali"
                            name="penghasilan_bulanan_wali"
                            value="{{ old('penghasilan_bulanan_wali', $wali->penghasilan_bulanan ?? '') }}">
                        @error('penghasilan_bulanan_wali')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status Pernikahan -->
                    <div class="mb-3">
                        <label for="statusPernikahanWali" class="form-label">Status Pernikahan</label>
                        <select class="form-select" name="status_pernikahan_wali" id="statusWali">
                            <option value="" disabled selected>{{ $wali->status_pernikahan ?? '--Pilih Status--' }}
                            </option>
                            <option value="Lajang" {{ (old('status_pernikahan')=='Lajang' || (isset($wali) && $wali->
                                status_pernikahan == 'Lajang')) ? 'selected' : '' }}>Lajang</option>
                            <option value="Menikah" {{ (old('status_pernikahan')=='Menikah' || (isset($wali) && $wali->
                                status_pernikahan == 'Menikah')) ? 'selected' : '' }}>Menikah</option>
                            <option value="Belum Menikah" {{ (old('status_pernikahan')=='Pernah Menikah(Duda/Janda)' ||
                                (isset($wali) && $wali->status_pernikahan == 'Pernah Menikah(Duda/Janda)')) ? 'selected'
                                : '' }}>Pernah Menikah(Duda/Janda)</option>
                        </select>
                        @error('status_pernikahan_wali')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamatWali" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamatWali" name="alamat_wali"
                            value="{{ old('alamat_wali', $wali->alamat?? '') }}">
                        @error('alamat_wali')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- No Rumah, RT, RW, Kode Pos -->
                    <div class="row">
                        <div class="col-3">
                            <label for="noRumahWali" class="form-label">No Rumah</label>
                            <input type="text" class="form-control" id="noRumahWali" name="no_rumah_wali"
                                value="{{ old('no_rumah_wali', $wali->no_rumah ?? '') }}">
                            @error('no_rumah_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="rtWali" class="form-label">RT</label>
                            <input type="text" class="form-control" id="rtWali" name="rt_wali"
                                value="{{ old('rt_wali', $wali->rt ?? '') }}">
                            @error('rt_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="rwWali" class="form-label">RW</label>
                            <input type="text" class="form-control" id="rwWali" name="rw_wali"
                                value="{{ old('rw_wali', $wali->rw ?? '') }}">
                            @error('rw_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="kodePosWali" class="form-label">Kode Pos</label>
                            <input type="text" class="form-control" id="kodePosWali" name="kode_pos_wali"
                                value="{{ old('kode_pos_wali', $wali->kode_pos ?? '') }}">
                            @error('kode_pos_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Provinsi, Kota, Kecamatan, Desa -->
                    <div class="row">
                        <div class="col-3">
                            <label for="provinsiWali" class="form-label">Provinsi</label>
                            <input type="text" class="form-control" id="provinsiWali" name="provinsi_wali"
                                value="{{ old('provinsi_wali', $wali->provinsi ?? '') }}">
                            @error('provinsi_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="kotaWali" class="form-label">Kota</label>
                            <input type="text" class="form-control" id="kotaWali" name="kota_wali"
                                value="{{ old('kota_wali', $wali->kota ?? '') }}">
                            @error('kota_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="kecamatanWali" class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatanWali" name="kecamatan_wali"
                                value="{{ old('kecamatan_wali', $wali->kecamatan ?? '') }}">
                            @error('kecamatan_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="desaWali" class="form-label">Desa</label>
                            <input type="text" class="form-control" id="desaWali" name="desa_wali"
                                value="{{ old('desa_wali', $wali->desa ?? '') }}">
                            @error('desa_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- No Telp & Email -->
                    <div class="row">
                        <div class="col-6">
                            <label for="noTelpWali" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="noTelpWali" name="no_telp_wali"
                                value="{{ old('no_telp_wali', $wali->no_telp ?? '') }}">
                            @error('no_telp_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="emailWali" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailWali" name="email_wali"
                                value="{{ old('email_wali', $wali->email ?? '') }}">
                            @error('email_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- File Uploads -->
                    <div class="row mb-3">
                        @if ($wali)
                            <div class="col-6">
                                <img src="..." class="img-thumbnail" alt="...">
                            </div>
                            <div class="col-6">
                                <img src="..." class="img-thumbnail" alt="...">
                            </div>
                        @else
                        <div class="col-6">
                            <label for="photoWali" class="form-label">Photo Wali</label>
                            <input type="file" class="form-control" id="photoWali" name="photo_wali">
                            @error('photo_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="ktpWali" class="form-label">KTP Wali</label>
                            <input type="file" class="form-control" id="ktpWali" name="ktp_wali">
                            @error('ktp_wali')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>


            </div>

            <div class="tab-pane fade pt-3" id="profile-change-password">
                <form
                    action="{{ $saudara ? url('mahasiswa/data-saudara/'.$saudara->id) : url('mahasiswa/data-saudara') }}"
                    method="post">
                    @csrf
                    @if ($saudara)
                    @method('put')
                    @endif
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="status_saudara1" class="form-label">Status</label>
                            <select class="form-select" aria-label="Default select example" name="status_saudara1"
                                id="status_saudara1">
                                <option value="" disabled {{ old('status_saudara1', $saudara->status_saudara1 ?? '') ===
                                    '' ? 'selected' : '' }}>Pilih Status</option>
                                <option value="Kakak" {{ old('status_saudara1', $saudara->status_saudara1 ?? '') ==
                                    'Kakak' ? 'selected' : '' }}>Kakak</option>
                                <option value="adik" {{ old('status_saudara1', $saudara->status_saudara1 ?? '') ==
                                    'adik' ? 'selected' : '' }}>Adik</option>
                            </select>
                            @error('status_saudara1')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="nama_saudara1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama_saudara1" name="nama_saudara1"
                                value="{{ old('nama_saudara1', $saudara->nama_saudara1 ?? '') }}">
                            @error('nama_saudara1')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="pendidikan_saudara1" class="form-label">Pendidikan Terakhir</label>
                            <select class="form-select" aria-label="Default select example" name="pendidikan_saudara1"
                                id="pendidikan_saudara1">
                                <option value="" disabled {{ old('pendidikan_saudara1', $saudara->pendidikan_terakhir1
                                    ?? '') === '' ? 'selected' : '' }}>Pilih Pendidikan</option>
                                <option value="SD" {{ old('pendidikan_saudara1', $saudara->pendidikan_terakhir1 ?? '')
                                    == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ old('pendidikan_saudara1', $saudara->pendidikan_terakhir1 ?? '')
                                    == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ old('pendidikan_saudara1', $saudara->pendidikan_terakhir1 ?? '')
                                    == 'SMA' ? 'selected' : '' }}>SMA</option>
                                <option value="DIPLOMA" {{ old('pendidikan_saudara1', $saudara->pendidikan_terakhir1 ??
                                    '') == 'DIPLOMA' ? 'selected' : '' }}>DIPLOMA</option>
                                <option value="S1" {{ old('pendidikan_saudara1', $saudara->pendidikan_terakhir1 ?? '')
                                    == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('pendidikan_saudara1', $saudara->pendidikan_terakhir1 ?? '')
                                    == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ old('pendidikan_saudara1', $saudara->pendidikan_terakhir1 ?? '')
                                    == 'S3' ? 'selected' : '' }}>S3</option>
                            </select>
                            @error('pendidikan_saudara1')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="pekerjaan_saudara1" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan_saudara1" name="pekerjaan_saudara1"
                                value="{{ old('pekerjaan_saudara1', $saudara->pekerjaan1 ?? '') }}">
                            @error('pekerjaan_saudara1')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="status_saudara2" class="form-label">Status</label>
                            <select class="form-select" aria-label="Default select example" name="status_saudara2"
                                id="status_saudara2">
                                <option value="" disabled {{ old('status_saudara2', $saudara->status_saudara2 ?? '') ===
                                    '' ? 'selected' : '' }}>Pilih Status</option>
                                <option value="Kakak" {{ old('status_saudara2', $saudara->status_saudara2 ?? '') ==
                                    'Kakak' ? 'selected' : '' }}>Kakak</option>
                                <option value="adik" {{ old('status_saudara2', $saudara->status_saudara2 ?? '') ==
                                    'adik' ? 'selected' : '' }}>Adik</option>
                            </select>
                            @error('status_saudara2')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="nama_saudara2" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama_saudara2" name="nama_saudara2"
                                value="{{ old('nama_saudara2', $saudara->nama_saudara2 ?? '') }}">
                            @error('nama_saudara2')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="pendidikan_saudara2" class="form-label">Pendidikan Terakhir</label>
                            <select class="form-select" aria-label="Default select example" name="pendidikan_saudara2"
                                id="pendidikan_saudara2">
                                <option value="" disabled {{ old('pendidikan_saudara2', $saudara->pendidikan_terakhir2
                                    ?? '') === '' ? 'selected' : '' }}>Pilih Pendidikan</option>
                                <option value="SD" {{ old('pendidikan_saudara2', $saudara->pendidikan_terakhir2 ?? '')
                                    == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ old('pendidikan_saudara2', $saudara->pendidikan_terakhir2 ?? '')
                                    == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ old('pendidikan_saudara2', $saudara->pendidikan_terakhir2 ?? '')
                                    == 'SMA' ? 'selected' : '' }}>SMA</option>
                                <option value="DIPLOMA" {{ old('pendidikan_saudara2', $saudara->pendidikan_terakhir2 ??
                                    '') == 'DIPLOMA' ? 'selected' : '' }}>DIPLOMA</option>
                                <option value="S1" {{ old('pendidikan_saudara2', $saudara->pendidikan_terakhir2 ?? '')
                                    == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('pendidikan_saudara2', $saudara->pendidikan_terakhir2 ?? '')
                                    == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ old('pendidikan_saudara2', $saudara->pendidikan_terakhir2 ?? '')
                                    == 'S3' ? 'selected' : '' }}>S3</option>
                            </select>
                            @error('pendidikan_saudara2')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="pekerjaan_saudara2" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan_saudara2" name="pekerjaan_saudara2"
                                value="{{ old('pekerjaan_saudara2', $saudara->pekerjaan2 ?? '') }}">
                            @error('pekerjaan_saudara2')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="status_saudara3" class="form-label">Status</label>
                            <select class="form-select" aria-label="Default select example" name="status_saudara3"
                                id="status_saudara3">
                                <option value="" disabled {{ old('status_saudara3', $saudara->status_saudara3 ?? '') ===
                                    '' ? 'selected' : '' }}>Pilih Status</option>
                                <option value="Kakak" {{ old('status_saudara3', $saudara->status_saudara3 ?? '') ==
                                    'Kakak' ? 'selected' : '' }}>Kakak</option>
                                <option value="adik" {{ old('status_saudara3', $saudara->status_saudara3 ?? '') ==
                                    'adik' ? 'selected' : '' }}>Adik</option>
                            </select>
                            @error('status_saudara3')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="nama_saudara3" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama_saudara3" name="nama_saudara3"
                                value="{{ old('nama_saudara3', $saudara->nama_saudara3 ?? '') }}">
                            @error('nama_saudara3')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="pendidikan_saudara3" class="form-label">Pendidikan Terakhir</label>
                            <select class="form-select" aria-label="Default select example" name="pendidikan_saudara3"
                                id="pendidikan_saudara3">
                                <option value="" disabled {{ old('pendidikan_saudara3', $saudara->pendidikan_terakhir3
                                    ?? '') === '' ? 'selected' : '' }}>Pilih Pendidikan</option>
                                <option value="SD" {{ old('pendidikan_saudara3', $saudara->pendidikan_terakhir3 ?? '')
                                    == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ old('pendidikan_saudara3', $saudara->pendidikan_terakhir3 ?? '')
                                    == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ old('pendidikan_saudara3', $saudara->pendidikan_terakhir3 ?? '')
                                    == 'SMA' ? 'selected' : '' }}>SMA</option>
                                <option value="DIPLOMA" {{ old('pendidikan_saudara3', $saudara->pendidikan_terakhir3 ??
                                    '') == 'DIPLOMA' ? 'selected' : '' }}>DIPLOMA</option>
                                <option value="S1" {{ old('pendidikan_saudara3', $saudara->pendidikan_terakhir3 ?? '')
                                    == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('pendidikan_saudara3', $saudara->pendidikan_terakhir3 ?? '')
                                    == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ old('pendidikan_saudara3', $saudara->pendidikan_terakhir3 ?? '')
                                    == 'S3' ? 'selected' : '' }}>S3</option>
                            </select>
                            @error('pendidikan_saudara3')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="pekerjaan_saudara3" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan_saudara3" name="pekerjaan_saudara3"
                                value="{{ old('pekerjaan_saudara3', $saudara->pekerjaan3 ?? '') }}">
                            @error('pekerjaan_saudara3')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>


            </div>

        </div><!-- End Bordered Tabs -->

    </div>
</div>
@endsection