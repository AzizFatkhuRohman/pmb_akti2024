@extends('layouts.in.app')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row mt-3">
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="nama">
                    @error('nama')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <label for="" class="form-label">Jalur Pendaftaran</label>
                <select class="form-select" aria-label="Default select example" name="jalur_daftar">
                    <option value="Prestasi">Prestasi</option>
                    <option value="Rekomendasi SMK Binaan">Rekomendasi SMK Binaan</option>
                  </select>
                  @error('jalur_daftar')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label">NIK</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nik">
                @error('nik')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
    </div>
</div>
@endsection