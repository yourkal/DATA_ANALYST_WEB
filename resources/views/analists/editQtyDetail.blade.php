@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Qty untuk {{ $analist->nama_material }}</h2>

    <form action="{{ route('analists.updateQtyDetail', ['id' => $analist->id, 'qtyDetailId' => $qtyDetail->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $qtyDetail->tanggal }}" required>
        </div>
        <div class="form-group">
            <label for="jam">Jam</label>
            <input type="time" name="jam" class="form-control" value="{{ $qtyDetail->jam }}" required>
        </div>
        <div class="form-group">
            <label for="nama_material">Nama Material</label>
            <input type="text" name="nama_material" class="form-control" value="{{ $qtyDetail->nama_material }}" required>
        </div>
        <div class="form-group">
            <label for="barang_masuk">Barang Masuk</label>
            <input type="number" name="barang_masuk" class="form-control" value="{{ $qtyDetail->barang_masuk }}" required>
        </div>
        <div class="form-group">
            <label for="barang_keluar">Barang Keluar</label>
            <input type="number" name="barang_keluar" class="form-control" value="{{ $qtyDetail->barang_keluar }}" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar (Opsional)</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>

    <h3 class="mt-4">Riwayat Qty</h3>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Nama Material</th>
                <th>Barang Masuk</th>
                <th>Barang Keluar</th>
                @auth
                    <th>Aksi</th>
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
                    @auth
                        <td>
                            <form action="{{ route('analists.deleteQtyDetail', ['id' => $analist->id, 'qtyDetailId' => $detail->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
