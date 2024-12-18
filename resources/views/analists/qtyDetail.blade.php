@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <h2>Detail Qty untuk {{ $analist->nama_material }}</h2> --}}

    {{-- Tampilkan form hanya jika user login dan bukan user dengan id 1 --}}
    @auth
        @if(Auth::id() !== 1 && Auth::id() !== 3)
            <h3>Form Tambah Masuk dan Keluar Qty {{ $analist->nama_material }}</h3>
            <form action="{{ route('analists.storeQtyDetail', ['id' => $analist->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="jam">Jam</label>
                    <input type="time" name="jam" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nama_material">Nama Material</label>
                    <input type="text" name="nama_material" class="form-control" value="{{ $analist->nama_material }}" required>
                </div>
                <div class="form-group">
                    <label for="barang_masuk">Material Masuk</label>
                    <input type="number" name="barang_masuk" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="barang_keluar">Material Keluar</label>
                    <input type="number" name="barang_keluar" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        @endif
    @endauth

    <hr>

    <h3 class="mt-4">Riwayat Qty</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Nama Material</th>
                    <th>Material Masuk</th>
                    <th>Material Keluar</th>
                    {{-- Tampilkan kolom aksi hanya jika user login dan bukan user dengan id 1 --}}
                    @auth
                        @if(Auth::id() !== 1)
                            <th>Aksi</th>
                        @endif
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($analist->qtyDetails as $index => $detail)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $detail->tanggal }}</td>
                        <td>{{ $detail->jam }}</td>
                        <td>{{ $detail->nama_material }}</td>
                        <td>{{ $detail->barang_masuk }}</td>
                        <td>{{ $detail->barang_keluar }}</td>
                        {{-- Tampilkan aksi hanya jika user login dan bukan user dengan id 1 --}}
                        @auth
                            @if(Auth::id() !== 1 && Auth::id() !== 3)
                                <td>
                                    <form action="{{ route('analists.deleteQtyDetail', ['id' => $analist->id, 'qtyDetailId' => $detail->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                    <a href="{{ route('analists.editQtyDetail', ['id' => $analist->id, 'qtyDetailId' => $detail->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            @endif
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>

    <h4>Total Qty</h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Total Material Masuk</th>
                    <th>Total Material Keluar</th>
                    <th>Total Sisa Material</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $analist->qtyDetails->sum('barang_masuk') }}</td>
                    <td>{{ $analist->qtyDetails->sum('barang_keluar') }}</td>
                    <td>{{ $analist->qtyDetails->sum('barang_masuk') - $analist->qtyDetails->sum('barang_keluar') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<style>
    hr {
        border: none;
        height: 1px;
        color: #333; 
        background-color: #333;
    }
</style>
@endsection
