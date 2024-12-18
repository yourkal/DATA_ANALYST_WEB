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
            /* display: flex; */
            align-items: center;
            /* Menyelaraskan item secara vertikal */
            color: rgb(0, 0, 0);
            /* padding: 10px; */
        }

        .header img {
            width: 50px;
            /* Atur ukuran gambar sesuai kebutuhan */
            height: auto;
            margin-right: 20px;
            /* Spasi antara logo dan teks */
        }

        .header h1 {
            font-size: 20px;
            margin: 0;
            text-align: center;
            /* Mengatur teks ke kiri */
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
            table-layout: auto;
            /* Biarkan lebar kolom menyesuaikan dengan konten */
        }

        th,
        td {
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
            max-width: 100px;
            /* Atur ukuran gambar */
            height: 100px;
        }

        /* Tambahkan styling khusus untuk gambar hasil analisis */
        .hasil-analisis-img {
            max-width: 200px;
            /* Ukuran gambar hasil analisis */
            height: auto;
        }

        /* Atur lebar kolom */
        .gambar-col {
            width: 100px;
            /* Lebar kolom gambar */
        }

        .hasil-analisis-col {
            width: 200px;
            /* Lebar maksimum kolom hasil analisis */
        }

        .nama-material-col {
            width: 70px;
        }

        .no-col {
            width: 15px;
        }

        .qty-col {
            width: 15px;
        }

        .keterangan-col {
            min-width: 200px;
            /* Lebar minimum kolom Keterangan */
            max-width: 450px;
            /* Lebar maksimum kolom Keterangan */
            word-wrap: break-word;
            /* Memungkinkan teks panjang terputus ke baris berikutnya */
        }

        @media (max-width: 600px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header h1 {
                font-size: 22px;
            }

            th,
            td {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- Header dengan logo dan judul -->
    <div class="header">
        <h1>Data Hasil Analist PT. Mukti Mandiri Lestari</h1>
    </div>
    <p>Total Data: {{ $totalAnalists }}</p>
    <table>
        <thead>
            <tr>
                <th class="no-col">No</th>
                {{-- <th>Tanggal</th> --}}
                <th class="gambar-col">Gambar</th>
                <th class="hasil-analisis-col">Hasil Spectro</th>
                <th class="nama-material-col">Nama Material</th>
                <th class="qty-col">Qty</th>
                <th class="keterangan-col">Hasil Analisis</th> <!-- Tambahkan kelas keterangan-col -->
            </tr>
        </thead>
        <tbody>
            @foreach ($analists as $index => $analist)
                <tr>
                    <td class="no-col">{{ $index + 1 }}</td>
                    {{-- <td>{{ \Carbon\Carbon::parse($analist->tanggal)->format('d-m-Y') }}</td> --}}
                    <td class="gambar-col">
                        @if ($analist->gambar)
                            <img src="{{ public_path('uploads/' . $analist->gambar) }}" alt="Gambar">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                    <td class="hasil-analisis-col">
                        @if ($analist->hasil_analisis)
                            <img src="{{ public_path('uploads/' . $analist->hasil_analisis) }}" alt="Hasil Analisis"
                                class="hasil-analisis-img">
                        @else
                            Tidak ada hasil spectro
                        @endif
                    </td>
                    <td class="nama-material-col">{{ $analist->nama_material }}</td>
                    <td class="qty-col">{{ $analist->qty }}</td>
                    <td class="keterangan-col">{{ $analist->keterangan }}</td> <!-- Tambahkan kelas keterangan-col -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>