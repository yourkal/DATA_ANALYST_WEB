@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Tabel Data Analist -->
    <div class="container">

         <!-- Keterangan Filter -->
         <div class="alert alert-info">
            <strong>Keterangan:</strong>
            <ul>
                <li>Sesuaikan filter berdasarkan keperluan</li>
                {{-- <li>Jika ingin membuat laporan harian, bisa filter berdasarkan tanggal</li> --}}
                <li>Jika ingin mencari/mengunduh data harian, bisa filter <strong> berdasarkan Tanggal Saja</strong></li>
                <li>Jika ingin mencari/mengunduh data tertentu, bisa filter <strong> berdasarkan Nama Material Saja</strong></li>
                <li>Jika sudah menginput tanggal/nama material, tekan <strong> Filter </strong>  agar kolom pencarian melakukan filter data yang difilter</li>
                <li>Jika sudah menginput tanggal/nama material, tekan <strong> Reset Filter </strong>  agar kolom pencarian kosong atau isi dengan yang baru</li>
            </ul>
        </div>

        <!-- Form Filter Berdasarkan Tanggal dan Card Total Data Analist -->
        <div class="row mb-2">
            <div class="col-md-8">
                <form action="{{ route('dashboard') }}" method="GET" id="filterForm">
                    <div class="row align-items-end">
                        <div class="col-md-6 mb-3">
                            <label for="filter_date"><strong> Berdasarkan Tanggal Saja:</strong></label>
                            <input type="date" name="filter_date" id="filter_date" class="form-control" value="{{ request('filter_date') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="filter_material"><strong> Berdasarkan Nama Material Saja:</strong></label>
                            <input type="text" name="filter_material" id="filter_material" class="form-control" placeholder="Masukan Nama Material..." value="{{ request('filter_material') }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-3d btn-primary btn-block">Filter</button>
                            <button type="button" class="btn btn-3d btn-danger btn-block" id="resetFilters">Reset Filter</button>
                        </div>
                    </div>
                </form>
                
            </div>
            
            <div class="col-md-4">
                <div class="card btn-3d bg-primary text-white mb-4 shadow" style="border-radius: 12px;">
                    <div class="card-body text-center">
                        <h4 class="card-title"><i class="fa fa-database"></i> Total Data Analist</h4>
                        <h3 class="card-text">
                            <strong class="text-white">{{ $analists->total() }}</strong> 
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <a href="{{ route('view_pdf', ['filter_date' => request('filter_date'), 'filter_material' => request('filter_material')]) }}" class="btn btn-3d btn-secondary mt-3">
                    <i class="fa fa-download"></i> Unduh Data Table (PDF)
                </a>
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
                            <td>{{ $loop->index + 1 + ($analists->currentPage() - 1) * $analists->perPage() }}</td>
                            <td>{{ $analist->tanggal }}</td>
                            <td>
                                @if($analist->gambar)
                                    <img src="{{ asset('uploads/' . $analist->gambar) }}" alt="Gambar" width="100" class="img-thumbnail zoomable" data-toggle="modal" data-target="#imageModal-{{ $analist->id }}">
                                @else
                                    <img src="{{ asset('images/gambar_kosong.png') }}" alt="Gambar Kosong" width="100" class="img-thumbnail zoomable">
                                @endif
                            </td>
                            
                            <td>{ $analist->nama_material }}</td>
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
                
                {{-- Pagination --}}
                <div class="d-flex justify-content-between align-items-center">
                    @if ($analists->onFirstPage())
                        <button class="btn btn-3d btn-secondary" disabled>Kembali</button>
                    @else
                        <a href="{{ $analists->previousPageUrl() }}" class="btn btn-3d btn-primary">Kembali</a>
                    @endif
                
                    @if ($analists->hasMorePages())
                        <a href="{{ $analists->nextPageUrl() }}" class="btn btn-3d btn-primary">Selanjutnya</a>
                    @else
                        <button class="btn btn-secondary" disabled>Selanjutnya</button>
                    @endif
                </div>          
        </div>
    </div>
</div>

<!-- JavaScript to clear input fields on form submit -->
<script>
   document.getElementById('resetFilters').addEventListener('click', function() {
    document.getElementById('filter_date').value = '';
    document.getElementById('filter_material').value = '';
    // Jika Anda ingin mengarahkan pengguna kembali ke halaman tanpa filter
    window.location.href = "{{ route('dashboard') }}";
});
</script>

<style>
    /* Efek 3D pada tombol */
    .btn-3d {
        transition: all 0.2s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    .btn-3d:active {
        transform: translateY(3px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    /* Mengatur radius dan gaya pada card dan filter */
    .card {
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        transition: box-shadow 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .form-control {
        border-radius: 8px;
    }

    /* Efek 3D pada card keterangan */
    .alert-info {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

@endsection
