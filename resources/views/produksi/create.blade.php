@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="my-2">
        <i class="fas fa-plus-circle"></i> Tambah Produksi
    </h2>

    <form action="{{ route('produksi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" required>
        </div>

        <div class="form-group">
            <label for="jam">Jam</label>
            <input type="time" class="form-control" name="jam" value="{{ old('jam') }}" required>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" name="gambar" accept="image/*">
        </div>

        <div class="form-group">
            <label for="nama_material">Nama Material</label>
            <input type="text" class="form-control" name="nama_material" required>
        </div>

        <div class="form-group">
            <label for="barang_masuk">Barang Masuk</label>
            <input type="number" class="form-control" name="barang_masuk" >
        </div>

        <div class="form-group">
            <label for="barang_keluar">Barang Keluar</label>
            <input type="number" class="form-control" name="barang_keluar" >
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('produksi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection