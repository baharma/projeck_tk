<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftaran Siswa</title>
    <style>
        /* Mengatur orientasi halaman menjadi landscape */
        @page {
            size: A4 landscape;
            margin: 20px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px; /* Mengurangi ukuran font untuk penghematan ruang */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px;
        }

        .student-section {
            margin-bottom: 25px;
        }

        .section-title {
            margin-bottom: 8px;
            font-size: 16px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th, td {
            border: 1px solid #000;
            padding: 4px 6px; /* Mengurangi padding untuk hemat ruang */
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f2f2f2;
            width: 20%; /* Menyesuaikan lebar kolom header */
            font-weight: bold;
        }

        .parents-table th {
            background-color: #e6f7ff;
        }

        /* Memisahkan informasi siswa dan orang tua dengan garis */
        .divider {
            border-bottom: 2px solid #000;
            margin: 15px 0;
        }

        /* Mengurangi margin antar section */
        .student-section + .student-section {
            margin-top: 15px;
        }

        /* Responsif untuk cetakan */
        @media print {
            body {
                margin: 0;
            }
        }
    </style>
</head>
<body>

    <h1>Data Pendaftaran Siswa</h1>


    <div class="student-section">

        <table class="student-info">
            <thead>

                <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Tempat Lahir</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Jumlah Saudara</th>
                    <th>Tinggi Badan</th>
                    <th>Berat Badan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ \Carbon\Carbon::parse($student->date_of_birth)->format('d-m-Y') }}</td>
                    <td>{{ $student->place_of_birth }}</td>
                    <td>{{ $student->agama ? $student->agama->name : 'N/A' }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->number_of_siblings }}</td>
                    <td>{{ $student->height }} cm</td>
                    <td>{{ $student->weight }} kg</td>
                    <td>{{ $student->status ? 'Aktif' : 'Tidak Aktif' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
