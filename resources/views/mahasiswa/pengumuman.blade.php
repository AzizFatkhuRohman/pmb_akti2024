@extends('layouts.in.app')
@section('content')
    <div class="container">
        <div class="card">
            <h5 class="card-header">Data {{$title}}</h5>
            <div class="card-body">
                <table class="table" id="pengumuman">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Photo</th>
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
            $('#pengumuman').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('pengumuman-api') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'judul', name: 'judul'},
                    {data: 'photo', name: 'photo',orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection