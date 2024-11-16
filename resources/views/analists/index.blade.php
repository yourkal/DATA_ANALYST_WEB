@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="heading">

            <h2 class="my-2">
                @if(auth()->user()->id !== 2)
                <i class="fas fa-flask"></i> Daftar Data Hasil Analist Material PT. Mukti Mandiri Lestari
                @else
                <i class="fas fa-flask"></i> Daftar Data Hasil Analist Material Quantity
                @endif
            </h2>
            <!-- Form Pencarian -->
            @if(auth()->user()->id !== 2)
            <form action="{{ route('analists.index') }}" method="GET" class="mb-3 p-4 bg-light rounded shadow">
                <!-- Tombol Tambah Analist -->
                <a href="{{ route('analists.create', ['page' => request('page')]) }}"
                    class="btn btn-3d btn-lg btn-primary mb-3 shadow">
                    <i class="fas fa-plus-circle"></i> Tambah Data Analist
                </a>

                <div class="row align-items-end">
                    <!-- Filter Berdasarkan Nama Material -->
                    <div class="col-md-5">
                        <label for="search" class="form-label font-weight-bold" style="color: #000;">Filter Berdasarkan
                            Nama Material</label>
                        <input type="text" id="search" class="form-control" name="search" placeholder="Nama Material"
                            value="{{ request()->get('search') }}" style="padding: 10px; font-size: 14px;">
                    </div>

                    <!-- Filter Berdasarkan Tanggal -->
                    <div class="col-md-5">
                        <label for="tanggal" class="form-label font-weight-bold" style="color: #000;">Filter Berdasarkan
                            Tanggal</label>
                        <input type="date" id="tanggal" class="form-control" name="tanggal"
                            value="{{ request()->get('tanggal') }}" style="padding: 10px; font-size: 14px;">
                    </div>

                    <!-- Tombol Cari dan Reset -->
                    <div class="col-md-2 d-flex flex-column">
                        <button class="btn btn-primary w-100 mb-2" type="submit">
                            <i class="fas fa-search me-2"></i> Cari
                        </button>
                        <a href="{{ route('analists.index') }}" class="btn btn-secondary w-100">
                            <i class="fas fa-sync me-2"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
            @endif
        </div>

        <div class="table-responsive table-responsive-scroll">
            <table class="table table-bordered table-striped w-100 table-hover table-rounded">
                <thead style="background-color: #007bff; color: white;">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        @if(auth()->user()->id !== 2)
                        <th class="text-center">Hasil Spectro</th>
                        @endif
                        <th class="text-center">Gambar</th>
                        <th class="text-center">Nama Material</th>
                        <th class="text-center">Qty</th>
                        @if(auth()->user()->id !== 2)
                            <th class="text-center">Hasil Analisis</th>
                            <th class="text-center">File PDF</th>
                            <th class="text-center">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse($analists as $analist)
                        <tr id="analist-{{ $analist->id }}">
                            <td>{{ $analists->firstItem() + $loop->index }}</td>
                            <td>{{ $analist->tanggal }}</td>
                            @if(auth()->user()->id !== 2)
                            <td>
                                @if ($analist->hasil_analisis)
                                <img src="{{ asset('uploads/' . $analist->hasil_analisis) }}" alt="Hasil Analisis"
                                width="200" height="auto" class="img-thumbnail">
                                @else
                                <img src="{{ asset('                                        gambar_kosong.png') }}" alt="Gambar Kosong" width="100"
                                class="img-thumbnail">
                                    @endif
                                </td>
                            @endif
                            <td>
                                @if ($analist->gambar)
                                    <img src="{{ asset('uploads/' . $analist->gambar) }}" alt="Gambar" width="100"
                                        class="img-thumbnail zoomable" data-toggle="modal"
                                        data-target="#imageModal-{{ $analist->id }}">
                                @else
                                    <img src="{{ asset('images/gambar_kosong.png') }}" alt="Gambar Kosong" width="100"
                                        class="img-thumbnail zoomable">
                                @endif
                            </td>
                            <td>{{ $analist->nama_material ?? 'belum ada nama' }}</td>
                            <td>
                                <a href="{{ route('analists.qtyDetail', $analist->id) }}" class="btn btn-link">
                                    {{ $analist->qty }}
                                </a>
                            </td>
                            @if(auth()->user()->id !== 2)
                                <td style="width: 25%;">{!! nl2br(e($analist->keterangan)) !!}</td>
                                <td>
                                    @if ($analist->file_pdf)
                                        <a href="{{ asset('uploads/' . $analist->file_pdf) }}"
                                            class="btn btn-outline-info btn-sm mb-3" target="_blank">Lihat PDF</a>
                                    @else
                                        <span>Tidak ada file</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('analists.edit', ['id' => $analist->id, 'page' => request('page')]) }}"
                                            class="btn btn-3d btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
    
                                        <form
                                            action="{{ route('analists.destroy', ['id' => $analist->id, 'page' => request('page')]) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-3d btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            @endif
                        </tr>

                        <!-- Modal untuk Gambar -->
                        @if(auth()->user()->id !== 2)
                            <div class="modal fade" id="imageModal-{{ $analist->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="imageModalLabel-{{ $analist->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel-{{ $analist->id }}">Gambar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('uploads/' . $analist->gambar) }}" alt="Gambar"
                                                class="img-fluid">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal untuk Hasil Analisis -->
                            <div class="modal fade" id="hasilModal-{{ $analist->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="hasilModalLabel-{{ $analist->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hasilModalLabel-{{ $analist->id }}">Hasil Spectro
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if ($analist->hasil_analisis)
                                                <img src="{{ asset('uploads/' . $analist->hasil_analisis) }}"
                                                    alt="Hasil Analisis" class="img-fluid">
                                            @else
                                                <p>Tidak ada hasil spectro</p>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data yang ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Tampilkan pagination links -->
        <div class="d-flex justify-content-center">
            <ul class="pagination">
                @if ($analists->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">Previous</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $analists->previousPageUrl() }}">Previous</a></li>
                @endif

                @for ($i = 1; $i <= $analists->lastPage(); $i++)
                    <li class="page-item {{ $i == $analists->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $analists->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @if ($analists->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $analists->nextPageUrl() }}">Next</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">Next</span></li>
                @endif
            </ul>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const highlightId = "{{ request('highlight') }}";
            if (highlightId) {
                window.location.hash = `#analist-${highlightId}`;
            }
        });
    </script>
@endsection