<?php

namespace App\Http\Controllers;

use Log;
use Mpdf\Mpdf;
use App\Models\Analist;
use Illuminate\Http\Request;

class AnalistController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $analists = Analist::when($search, function ($query, $search) {
            return $query->where('nama_material', 'like', "%{$search}%")->orWhere('qty', 'like', "%{$search}%"); // Mengganti kategori menjadi qty
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
            'hasil_analisis' => 'nullable|image|mimes:jpeg,png,jpg,gif',
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

        if ($request->hasFile('hasil_analisis')) {
            $hasilAnalisisName = time() . '.' . $request->hasil_analisis->extension();
            $request->hasil_analisis->move(public_path('uploads'), $hasilAnalisisName);
            $analist->hasil_analisis = $hasilAnalisisName;
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
            'qty' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'hasil_analisis' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'file_pdf' => 'nullable|mimes:pdf|max:10000',
        ]);
    
        $analist = Analist::findOrFail($id);
        $analist->nama_material = $request->nama_material;
        $analist->qty = $request->qty;
        $analist->keterangan = $request->keterangan;
        $analist->tanggal = $request->tanggal;
    
        // Hapus gambar jika checkbox diaktifkan
        if ($request->has('hapus_gambar') && $analist->gambar) {
            // Hapus file dari direktori
            $path = public_path('uploads/' . $analist->gambar);
            if (file_exists($path)) {
                unlink($path);
            }
            // Hapus nama file dari database
            $analist->gambar = null;
        }
    
        if ($request->hasFile('gambar')) {
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads'), $fileName);
            $analist->gambar = $fileName;
        }
    
        if ($request->hasFile('hasil_analisis')) {
            $hasilAnalisisName = time() . '.' . $request->hasil_analisis->extension();
            $request->hasil_analisis->move(public_path('uploads'), $hasilAnalisisName);
            $analist->hasil_analisis = $hasilAnalisisName;
        }
    
        if ($request->hasFile('file_pdf')) {
            $pdfName = time() . '.' . $request->file_pdf->extension();
            $request->file_pdf->move(public_path('uploads'), $pdfName);
            $analist->file_pdf = $pdfName;
        }
    
        $analist->save();
    
        $page = $request->input('page', 1);
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
        $filterDate = $request->get('filter_date');
        $filterMaterial = $request->get('filter_material');

        // Buat query untuk analist
        $query = Analist::query();

        // Jika tanggal dipilih
        if ($filterDate) {
            $query->whereDate('tanggal', $filterDate);
        }

        // Jika nama material dipilih
        if ($filterMaterial) {
            $query->where('nama_material', 'like', '%' . $filterMaterial . '%');
        }

        // Mengambil data analist dengan pagination
        $perPage = 1000; // Ubah sesuai kebutuhan
        $analists = $query->paginate($perPage);

        // Menghitung total data analist
        $totalAnalists = $analists->total();

        return view('dashboard', compact('totalAnalists', 'analists', 'filterDate', 'filterMaterial'));
    }

    public function view_pdf(Request $request)
    {
        $filterDate = $request->get('filter_date');
        $filterMaterial = $request->get('filter_material');

        // Mengambil data analist dengan filtering berdasarkan tanggal dan nama material
        $query = Analist::select('nama_material', 'qty', 'keterangan', 'tanggal', 'gambar','hasil_analisis');

        // Filter berdasarkan tanggal jika ada
        if ($filterDate) {
            $query->whereDate('tanggal', $filterDate);
        }

        // Filter berdasarkan nama material jika ada
        if ($filterMaterial) {
            $query->where('nama_material', 'like', '%' . $filterMaterial . '%');
        }

        // Ambil semua data analist yang sesuai filter untuk PDF
        $analists = $query->get();

        // Menghitung total data analist
        $totalAnalists = $analists->count();

        // Render view dengan Mpdf
        $mpdf = new \Mpdf\Mpdf();
        $html = view('pdf.halamanPDF', compact('totalAnalists', 'analists'))->render();
        $mpdf->WriteHTML($html);
        return $mpdf->Output('Data_Analist.pdf', 'D');
    }
}
