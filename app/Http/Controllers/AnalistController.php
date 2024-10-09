<?php

namespace App\Http\Controllers;

use App\Models\Analist;
use Illuminate\Http\Request;

class AnalistController extends Controller
{
    public function index(Request $request)
{
    $search = $request->get('search');
    $analists = Analist::when($search, function ($query, $search) {
        return $query->where('nama_material', 'like', "%{$search}%")
                     ->orWhere('kategori', 'like', "%{$search}%");
    })->paginate(100); // Pagination, membatasi 10 baris per halaman

    return view('analists.index', compact('analists'));
}


    public function create()
    {
        return view('analists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_material' => 'required',
            'kategori' => 'required',
            'keterangan' => 'required',
            'waktu' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'file_pdf' => 'nullable|mimes:pdf|max:10000',
        ]);

        $analist = new Analist();
        $analist->nama_material = $request->nama_material;
        $analist->kategori = $request->kategori;
        $analist->keterangan = $request->keterangan;
        $analist->waktu = $request->waktu; // Menyimpan waktu sebagai deskripsi teks

        if ($request->hasFile('gambar')) {
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads'), $fileName);
            $analist->gambar = $fileName;
        }

        if ($request->hasFile('file_pdf')) {
            $pdfName = time() . '.' . $request->file_pdf->extension();
            $request->file_pdf->move(public_path('uploads'), $pdfName);
            $analist->file_pdf = $pdfName;
        }

        $analist->save();
        $page = $request->input('page', 1); // Ambil nilai halaman, default ke 1 jika tidak ada

    return redirect()->route('analists.index', ['page' => $page]);
    }

    public function edit($id)
    {
        $analist = Analist::findOrFail($id);
        return view('analists.edit', compact('analist'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_material' => 'required',
            'kategori' => 'required',
            'keterangan' => 'required',
            'waktu' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'file_pdf' => 'nullable|mimes:pdf|max:10000',
        ]);

        $analist = Analist::findOrFail($id);
        $analist->nama_material = $request->nama_material;
        $analist->kategori = $request->kategori;
        $analist->keterangan = $request->keterangan;
        $analist->waktu = $request->waktu; // Menyimpan waktu sebagai deskripsi teks

        if ($request->hasFile('gambar')) {
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads'), $fileName);
            $analist->gambar = $fileName;
        }

        if ($request->hasFile('file_pdf')) {
            $pdfName = time() . '.' . $request->file_pdf->extension();
            $request->file_pdf->move(public_path('uploads'), $pdfName);
            $analist->file_pdf = $pdfName;
        }

        $analist->save();
        $page = $request->input('page', 1); // Ambil nilai halaman, default ke 1 jika tidak ada

        return redirect()->route('analists.index', ['page' => $page]);
    }

    public function destroy( Request $request, $id)
    {
        $analist = Analist::findOrFail($id);
        $analist->delete();
        $page = $request->input('page', 1); // Ambil nilai halaman, default ke 1 jika tidak ada

    return redirect()->route('analists.index', ['page' => $page]);
    }
}
