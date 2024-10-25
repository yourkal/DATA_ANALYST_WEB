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
                         ->orWhere('qty', 'like', "%{$search}%"); // Mengganti kategori menjadi qty
        })->paginate(1000); // Pagination, membatasi 100 baris per halaman

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
            'qty' => 'required', // Mengganti kategori menjadi qty
            'keterangan' => 'required',
            'tanggal' => 'required|string', // Mengganti waktu menjadi tanggal
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'file_pdf' => 'nullable|mimes:pdf|max:1000000',
        ]);

        $analist = new Analist();
        $analist->nama_material = $request->nama_material;
        $analist->qty = $request->qty; // Mengganti kategori menjadi qty
        $analist->keterangan = $request->keterangan;
        $analist->tanggal = $request->tanggal; // Mengganti waktu menjadi tanggal

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
            'qty' => 'required', // Mengganti kategori menjadi qty
            'keterangan' => 'required',
            'tanggal' => 'required|string', // Mengganti waktu menjadi tanggal
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'file_pdf' => 'nullable|mimes:pdf|max:10000',
        ]);

        $analist = Analist::findOrFail($id);
        $analist->nama_material = $request->nama_material;
        $analist->qty = $request->qty; // Mengganti kategori menjadi qty
        $analist->keterangan = $request->keterangan;
        $analist->tanggal = $request->tanggal; // Mengganti waktu menjadi tanggal

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

    public function destroy(Request $request, $id)
    {
        $analist = Analist::findOrFail($id);
        $analist->delete();

        $page = $request->input('page', 1); // Ambil nilai halaman, default ke 1 jika tidak ada
        return redirect()->route('analists.index', ['page' => $page]);
    }

    public function dashboard(Request $request)
    {
        $filterDate = $request->get('filter_date'); // Ambil input filter_date dari request
        
        $query = Analist::query();
    
        if ($filterDate) {
            // Jika tanggal dipilih, tampilkan data sesuai tanggal
            $query->whereDate('tanggal', $filterDate);
        }
    
        $totalAnalists = $query->count(); // Menghitung total data analist
        $analists = $query->get(); // Mengambil data analist yang sesuai filter
    
        return view('dashboard', compact('totalAnalists', 'analists'));
    }
    
}
