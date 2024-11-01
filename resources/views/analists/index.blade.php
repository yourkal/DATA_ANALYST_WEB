@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="heading">
            <h2 class="my-2">
                <i class="fas fa-flask"></i> Daftar Data Hasil Analist Material PT. Mukti Mandiri Lestari
            </h2>

            <!-- Tombol Tambah Analist -->
            <a href="{{ route('analists.create', ['page' => request('page')]) }}"
                class="btn btn-3d btn-lg btn-primary mb-3 shadow">
                <i class="fas fa-plus-circle"></i> Tambah Data Analist
            </a>

            <!-- Form Pencarian -->
            <form action="{{ route('analists.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan Nama Material"
                        value="{{ request()->get('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive table-responsive-scroll">
            <table class="table table-bordered table-striped w-100 table-hover table-rounded">
                <thead style="background-color: #007bff; color: white;">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Gambar</th>
                        <th class="text-center">Hasil Spectro</th>
                        <th class="text-center">Nama Material</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Hasil Analist</th>
                        <th class="text-center">File PDF</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($analists as $analist)
                        <tr>
                            <!-- Menggunakan penomoran yang sesuai dengan pagination -->
                            <td>{{ $analists->firstItem() + $loop->index }}</td>

                            <td>{{ $analist->tanggal }}</td>
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
                            <td>
                                @if ($analist->hasil_analisis)
                                    <img src="{{ asset('uploads/' . $analist->hasil_analisis) }}" alt="Hasil Analisis"
                                        width="200" height="auto" class="img-thumbnail zoomable" data-toggle="modal"
                                        data-target="#hasilModal-{{ $analist->id }}">
                                @else
                                    <img src="{{ asset('images/gambar_kosong.png') }}" alt="Gambar Kosong" width="100"
                                        class="img-thumbnail zoomable">
                                @endif
                            </td>
                            <td>{{ $analist->nama_material }}</td>
                            <td>{{ $analist->qty }}</td>
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
                        </tr>

                        <!-- Modal untuk Gambar -->
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Tampilkan pagination links -->
            <div class="d-flex justify-content-center">
                @if ($analists->onFirstPage())
                    <span class="btn btn-outline-secondary disabled">Previous</span>
                @else
                    <a href="{{ $analists->previousPageUrl() }}" class="btn btn-outline-primary">Previous</a>
                @endif

                @if ($analists->hasMorePages())
                    <a href="{{ $analists->nextPageUrl() }}" class="btn btn-outline-primary">Next</a>
                @else
                    <span class="btn btn-outline-secondary disabled">Next</span>
                @endif
            </div>
        </div>
    </div>
@endsection
