@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Tabel Data Analist -->
    <div class="container">
         <!-- Card for Total Data Analist -->
         <div class="col-md-4">
            <div class="card bg-primary text-white mb-4 position-relative">
                <i class="fas fa-database"></i> <!-- Ikon besar di background -->
                <div class="card-body">
                    <h4>Total Data Analist</h4>
                    <h3>{{ $totalAnalists }}</h3>
                    <a href="{{ route('analists.index') }}" class="btn btn-light mt-3">Selengkapnya..</a>
                </div>
            </div>
        </div>

        {{-- <h1>Dashboard Data Analist</h1> --}}
        
        <!-- Form Filter Berdasarkan Tanggal -->
        <form action="{{ route('dashboard') }}" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <h2>Laporan Harian </h2>
                        <label for="filter_date">Filter Berdasarkan Tanggal:</label>
                        <input type="date" name="filter_date" id="filter_date" class="form-control" value="{{ request('filter_date') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary mt-4">Filter</button>
                </div>
            </div>
        </form>
    
        <!-- Total Data Analist -->
        <div class="row mt-4">
            <div class="col-md-12">
                <h4>Total Data Analist: {{ $totalAnalists }}</h4>
            </div>
        </div>
    
        <!-- Tabel Data Analist -->
        <div class="table-responsive table-responsive-scroll">
            <table class="table table-bordered table-striped w-100 table-hover table-rounded">
                <thead style="background-color: #007bff; color: white;">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Gambar</th>
                        <th class="text-center">Nama Material</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">File PDF</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($analists as $analist)
                        <tr>
                            <!-- Menggunakan penomoran yang sesuai dengan pagination -->
                            <td>{{  $loop->index+1 }}</td>
    
                            <td>{{$analist->tanggal}}</td>
                            <td>
                                @if($analist->gambar)
                                    <img src="{{ asset('uploads/' . $analist->gambar) }}" alt="Gambar" width="100" class="img-thumbnail zoomable" data-toggle="modal" data-target="#imageModal-{{ $analist->id }}">
                                @else
                                    <span>Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>{{ $analist->nama_material }}</td>
                            <td>{{ $analist->qty }}</td>
                            <td style="width: 25%;">{!! nl2br(e($analist->keterangan)) !!}</td>
                            <td>
                                @if($analist->file_pdf)
                                    <a href="{{ asset('uploads/' . $analist->file_pdf) }}" class="btn btn-outline-info btn-sm mb-3" target="_blank">Lihat PDF</a>
                                @else
                                    <span>Tidak ada file</span>
                                @endif
                            </td>
                            
                        </tr>
    
                        <!-- Modal untuk Gambar -->
                        <div class="modal fade" id="imageModal-{{ $analist->id }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel-{{ $analist->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="imageModalLabel-{{ $analist->id }}">Gambar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('uploads/' . $analist->gambar) }}" alt="Gambar" class="img-fluid">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
