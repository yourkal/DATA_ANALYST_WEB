@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Edit Analist</h2>
    <form action="{{ route('analists.update', $analist->id) }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
        @csrf
        @method('PUT')
        <input type="hidden" name="page" value="{{ request('page') }}">
        
        <div class="form-group row">
            <label for="nama_material" class="col-sm-2 col-form-label">Nama Material</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_material" name="nama_material" value="{{ $analist->nama_material }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $analist->kategori }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="keterangan" name="keterangan" rows="4" required>{{ $analist->keterangan }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="waktu" class="col-sm-2 col-form-label">Deskripsi Waktu</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="waktu" name="waktu" rows="2" required>{{ $analist->waktu }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" id="gambar" name="gambar">
                @if($analist->gambar)
                    <small class="form-text text-muted">Gambar saat ini:</small>
                    <img src="{{ asset('uploads/' . $analist->gambar) }}" alt="Gambar" class="img-thumbnail mb-3" width="100">
                @endif
                <small class="form-text text-muted">Format gambar: .jpg, .png, .gif</small>
            </div>
        </div>

        <div class="form-group row">
            <label for="file_pdf" class="col-sm-2 col-form-label">File PDF</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" id="file_pdf" name="file_pdf">
                @if($analist->file_pdf)
                    <small class="form-text text-muted">File PDF saat ini:</small>
                    <a href="{{ asset('uploads/' . $analist->file_pdf) }}" target="_blank" class="btn btn-outline-info btn-sm mb-3">Lihat PDF</a>
                @endif
                <small class="form-text text-muted">Format PDF: .pdf</small>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
