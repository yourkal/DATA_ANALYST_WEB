@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Tambah Data Analist</h2>
    <form action="{{ route('analists.store') }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
        @csrf
        
        <!-- Hidden input untuk menyimpan nilai page -->
        <input type="hidden" name="page" value="{{ request('page') }}">

        <div class="form-group row">
            <label for="nama_material" class="col-sm-2 col-form-label">Nama Material</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_material" name="nama_material" value="{{ old('nama_material') }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="qty" class="col-sm-2 col-form-label">Qty</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="qty" name="qty" value="{{ old('qty') }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="keterangan" name="keterangan" rows="4" required>{{ old('keterangan') }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" id="gambar" name="gambar">
                <small class="form-text text-muted">Format gambar: .jpg, .png, .gif</small>
            </div>
        </div>

        <div class="form-group row">
            <label for="file_pdf" class="col-sm-2 col-form-label">File PDF</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" id="file_pdf" name="file_pdf">
                <small class="form-text text-muted">Format PDF: .pdf</small>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection
