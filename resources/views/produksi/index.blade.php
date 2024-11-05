
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{ config('app.name', 'Analist App') }}</title> --}}

    <title>Data Hasil Analists Material | PT. Mukti Mandiri Lestari </title>
    <link rel="icon" href="{{ asset('images/LOGO_MUKTI.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Custom CSS (optional) -->
    <style>
        body {
            padding-top: 70px;
        }

        /* Custom style for full-width navbar */
        .navbar {
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/HederLogo.png') }}" alt="Logo" style="height: 50px; width: auto; margin-right: 10px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('produksi.index') }}">
                                <i class="fas fa-box"></i> Produksi
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Logout</button>
                            </form>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid">
        @yield('content')
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>


<div class="container-fluid">
    <div class="heading">
        <h2 class="my-2">
            <i class="fas fa-box"></i> Daftar Produksi Material
        </h2>

        <a href="{{ route('produksi.create') }}" class="btn btn-3d btn-lg btn-primary mb-3 shadow">
            <i class="fas fa-plus-circle"></i> Tambah Produksi
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped w-100 table-hover">
            <thead style="background-color: #007bff; color: white;">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Jam</th> <!-- Kolom Jam -->
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Nama Material</th>
                    <th class="text-center">Barang Masuk</th>
                    <th class="text-center">Barang Keluar</th>
                    {{-- <th class="text-center">Jumlah Akhir</th> --}}
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produksis as $produksi)
                    <tr>
                        <td>{{ $produksis->firstItem() + $loop->index }}</td>
                        <td>{{ $produksi->tanggal }}</td>
                        <td>{{ $produksi->jam }}</td> <!-- Tampilkan Jam -->
                        <td>
                            @if ($produksi->gambar)
                                <img src="{{ asset('uploads/' . $produksi->gambar) }}" alt="Gambar" width="100" class="img-thumbnail">
                            @else
                                <span>Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>{{ $produksi->nama_material }}</td>
                        <td>{{ $produksi->barang_masuk }}</td>
                        <td>{{ $produksi->barang_keluar }}</td>
                        {{-- <td>{{ $produksi->jumlah_akhir }}</td> --}}
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('produksi.edit', $produksi->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
            
                                <form action="{{ route('produksi.destroy', $produksi->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Data tidak ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @php
    // Menghitung total barang yang disimpan
    $totalBarangMasuk = $produksis->sum('barang_masuk');
    $totalBarangKeluar = $produksis->sum('barang_keluar');
    $totalBarangDisimpan = $totalBarangMasuk - $totalBarangKeluar;
@endphp

<div class="alert alert-info">
    <strong>Total Barang Disimpan:</strong> {{ $totalBarangDisimpan }}
</div>

        <!-- Tampilkan pagination links -->
        <div class="d-flex justify-content-center">
            {{ $produksis->links() }}
        </div>
    </div>
</div>