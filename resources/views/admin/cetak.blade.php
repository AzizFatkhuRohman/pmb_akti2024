<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jalur Daftar</th>
                <!-- Tambahkan header kolom lain sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            @php
                $no=1;
            @endphp
            @foreach($data as $mahasiswa)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $mahasiswa->nik }}</td>
                <td>{{ $mahasiswa->user->nama }}</td>
                <td>{{ $mahasiswa->jalur_daftar }}</td>
                <!-- Tambahkan data lain sesuai kebutuhan -->
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
