@extends('layouts.in.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>{{$title}}</h5>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-file-earmark-arrow-up-fill"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Export Excel</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('admin/cetak')}}" method="post">
                                @csrf
                                <select class="form-select" aria-label="Default select example" name="cetak_kategori">
                                    <option selected>Pilih Cetak</option>
                                    <option value="Prestasi">Prestasi</option>
                                    <option value="Rekomendasi SMK Binaan">Rekomendasi SMK Binaan</option>
                                    <option value="Reguler">Reguler</option>
                                </select>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Cetak</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table" id="mahasiswa">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jalur Pendaftaran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(function () {
            $('#mahasiswa').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('api-mahasiswa') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nik', name: 'nik'}, // Menampilkan nama dari relasi user
                    {data: 'nama', name: 'nama'},
                    {data: 'jalur_daftar', name: 'jalur_daftar'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
</script>
@endsection