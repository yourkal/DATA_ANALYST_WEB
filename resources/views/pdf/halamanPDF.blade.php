<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Analist</title>
    <style>
        /* Tambahkan styling yang diperlukan */
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        .header {
            display: flex;
            align-items: center; /* Menyelaraskan item secara vertikal */
            margin-bottom: 20px;
            color: rgb(0, 0, 0);
            padding: 15px;
            border-radius: 8px;
        }
        .header img {
            width: 50px; /* Atur ukuran gambar sesuai kebutuhan */
            height: auto;
            margin-right: 20px; /* Spasi antara logo dan teks */
        }
        .header h1 {
            font-size: 20px;
            margin: 0;
            text-align: center; /* Mengatur teks ke kiri */
        }
        p {
            font-size: 15px;
            margin: 10px 0;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e2e6ea;
        }
        img {
            max-width: 50px; /* Atur ukuran gambar */
            height: auto;
            border-radius: 4px; /* Tambahkan border-radius untuk gambar */
        }
        @media (max-width: 600px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
            .header h1 {
                font-size: 22px;
            }
            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Header dengan logo dan judul -->
    <div class="header">
        {{-- <img src="{{ public_path('images/LOGO_MUKTI.png') }}" alt="Logo Perusahaan"> --}}
        <h1>Data Hasil Analist PT. Mukti Mandiri Lestari</h1>
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
                    <td>{{ \Carbon\Carbon::parse($analist->tanggal)->format('d-m-Y') }}</td>
                    <td>
                        @if($analist->gambar)
                            <img src="{{ public_path('uploads/' . $analist->gambar) }}" alt="Gambar">
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