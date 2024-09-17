@extends('layouts.in.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Data Diri</h5>

            <!-- General Form Elements -->
            <form action="{{url('mahasiswa/data-calon-mahasiswa/'.$data->id)}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_lengkap" value="{{$data->user->nama}}">
                        @error('nama_lengkap')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Nomor Induk Kependudukan</label>

                    <div class="col-sm-10 row">
                        <div class="col-6">
                            <input type="number" class="form-control" name="nik" value="{{$data->nik}}">
                            @error('nik')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="file" class="form-control" name="file_nik">
                            <span>Unggah Scan Kartu Keluarga</span>
                            @error('file_nik')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">No Telp (Whatsapp)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="no_telp" value="{{$data->no_telp}}">
                        @error('no_telp')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="{{$data->user->email}}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                            <option value="{{$data->jenis_kelamin}}">{{$data->jenis_kelamin}}</option>
                            <option value="laki-laki">Laki - laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Kewarganegaraan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="kewarganegaraan"
                            value="{{$data->kewarganegaraan}}">
                        @error('kewarganegaraan')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="agama">
                            <option value="{{$data->agama}}">{{$data->agama}}</option>
                            <option value="Islam">Islam</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Kong Hu Cu">Kong Hu Cu</option>
                        </select>
                        @error('agama')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Status Pernikahan</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="status_pernikahan">
                            <option value="{{$data->status_pernikahan}}">{{$data->status_pernikahan}}</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                            <option value="Sudah Menikah">Sudah Menikah</option>
                        </select>
                        @error('status_pernikahan')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Tinggi Badan</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="tinggi" value="{{$data->tinggi_badan}}">
                    </div>
                    @error('tinggi')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Berat Badan</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="berat" value="{{$data->berat_badan}}">
                        @error('berat')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Gol Darah</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="darah">
                            <option value="{{$data->gol_darah}}">{{$data->gol_darah}}</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                        @error('darah')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tempat_lahir" value="{{$data->tempat_lahir}}">
                        @error('tempat_lahir')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal_lahir" value="{{$data->tanggal_lahir}}">
                        @error('tanggal_lahir')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Berkacamata?</label>
                    <div class="col-sm-10 row">
                        <div class="col-6">
                            <select class="form-select" aria-label="Default select example" name="berkacamata">
                                <option value="{{$data->kacamata}}">{{$data->kacamata}}</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                            @error('berkacamata')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input class="form-control" type="file" id="formFile" name="keterangan_sehat">
                            <span>Unggah Surat Keterangan Kesehatan</span>
                            @error('keterangan_sehat')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Pernah Patah Tulang?</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="patah_tulang">
                            <option value="{{$data->patah_tulang}}">{{$data->patah_tulang}}</option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                        @error('patah_tulang')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Alamat KTP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}">
                        @error('alamat')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">No.Rumah/RT/RW/Kode Pos</label>
                    <div class="col-sm-10 row">
                        <div class="col-3"><input type="number" class="form-control" name="no_rumah"
                                value="{{$data->no_rumah}}">
                            @error('no_rumah')
                            <span class="text-danger">{{$message}}</span>
                            @enderror</div>
                        <div class="col-3">
                            <input type="number" class="form-control" name="rt" value="{{$data->rt}}">
                        @error('rt')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="col-3">
                            <input type="number" class="form-control" name="rw" value="{{$data->rw}}">
                            @error('rw')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <input type="number" class="form-control" name="pos" value="{{$data->kode_pos}}">
                            @error('pos')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" value="{{$data->provinsi}}">
                        @error('provinsi')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Kota/Kabupaten</label>
                        <input type="text" class="form-control" name="kota" value="{{$data->kota}}">
                        @error('kota')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan" value="{{$data->kecamatan}}">
                        @error('kecamatan')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Desa/Kelurahan</label>
                        <input type="text" class="form-control" name="desa" value="{{$data->desa}}">
                        @error('desa')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="formFile" name="photo">
                        @error('photo')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Scan KTP</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="formFile" name="ktp">
                        @error('ktp')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form><!-- End General Form Elements -->
            <div class="row text-center">
                <div class="col-6">
                    <img src="..." class="img-thumbnail" alt="...">
                </div>
                <div class="col-6">
                    <img src="..." class="img-thumbnail" alt="...">
                </div>
            </div>

        </div>
    </div>
</div>
@endsection