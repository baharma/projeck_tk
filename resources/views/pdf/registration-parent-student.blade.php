<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftaran Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .section {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Data Pendaftaran Siswa</h1>
    <div class="section">
        <h2>Informasi Siswa: {{ $student->name }}</h2>
        <table>
            <tr>
                <th>Nama</th>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $student->gender }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $student->date_of_birth }}</td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td>{{ $student->place_of_birth }}</td>
            </tr>
            <tr>
                <th>Agama</th>
                <td>{{ $student->agama->name }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $student->address }}</td>
            </tr>
            <tr>
                <th>Telepon</th>
                <td>{{ $student->phone }}</td>
            </tr>
            <tr>
                <th>Jumlah Saudara</th>
                <td>{{ $student->number_of_siblings }}</td>
            </tr>
            <tr>
                <th>Tinggi Badan</th>
                <td>{{ $student->height }}</td>
            </tr>
            <tr>
                <th>Berat Badan</th>
                <td>{{ $student->weight }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ $student->kelas->name }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $student->status ? 'Aktif' : 'Tidak Aktif' }}</td>
            </tr>
        </table>
        <h3>Informasi Orang Tua</h3>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Tempat Lahir</th>
                    <th>Pendidikan</th>
                    <th>Pekerjaan</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($student->parents as $parent)
                <tr>
                    <td>{{ $parent->name }}</td>
                    <td>{{ $parent->date_of_birth }}</td>
                    <td>{{ $parent->place_of_birth }}</td>
                    <td>{{ $parent->education_id }}</td>
                    <td>{{ $parent->job }}</td>
                    <td>{{ $parent->address }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
