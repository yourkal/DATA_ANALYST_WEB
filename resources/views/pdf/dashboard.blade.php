<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Analist</title>
    <style>
        /* Tambahkan styling yang diperlukan */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 40px; /* Atur ukuran gambar sesuai kebutuhan */
            height: 50%;
            margin-right: 20px; /* Spasi antara logo dan teks */
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Header dengan logo dan judul -->
    <div class="header">
        {{-- <img src="{{ public_path('images/LOGO_MUKTI.png') }}" alt="Logo Perusahaan"> --}}
        <h1>Hasil Analist PT. Mukti Mandiri Lestari</h1>
    </div>
    <p>Total Data: {{ $totalAnalists }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Gambar</th>
                <th>Nama Material</th>
                <th>Qty</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($analists as $index => $analist)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $analist->tanggal }}</td>
                    <td>
                        @if($analist->gambar)
                            <img src="{{ public_path('uploads/' . $analist->gambar) }}" alt="Gambar" width="50">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                    <td>{{ $analist->nama_material }}</td>
                    <td>{{ $analist->qty }}</td>
                    <td>{{ $analist->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
