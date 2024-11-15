<?php

namespace App\Http\Controllers;

use Log;
use Mpdf\Mpdf;
use App\Models\Analist;
use App\Models\QtyDetail;
use Illuminate\Http\Request;

class AnalistController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $tanggal = $request->get('tanggal');
    
        $analists = Analist::when($search, function ($query, $search) {
                return $query->where('nama_material', 'like', "%{$search}%")
                             ->orWhere('qty', 'like', "%{$search}%");
            })
            ->when($tanggal, function ($query, $tanggal) {
                return $query->whereDate('tanggal', $tanggal);
            })
            ->orderBy('tanggal', 'asc') // Tambahkan orderBy untuk mengurutkan berdasarkan tanggal
            ->paginate(50); // Sesuaikan pagination sesuai kebutuhan
    
        return view('analists.index', compact('analists'));
    }
    

    public function create()
    {
        return view('analists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_material' => '',
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
            'nama_material' => '',
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
    
        if ($request->has('hapus_gambar') && $analist->gambar) {
            $path = public_path('uploads/' . $analist->gambar);
            if (file_exists($path)) {
                unlink($path);
            }
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
    
        // Redirect dengan parameter ID untuk scroll ke data
        return redirect()->route('analists.index', ['page' => $page, 'highlight' => $analist->id]);
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
        $perPage = 50; // Ubah sesuai kebutuhan
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
        $query = Analist::select('nama_material', 'qty', 'keterangan', 'tanggal', 'gambar', 'hasil_analisis');

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
        return $mpdf->Output('Data_Analist.pdf', 'I');
    }

    public function qtyDetail($id)
    {
        $analist = Analist::with('qtyDetails')->findOrFail($id);
        return view('analists.qtyDetail', compact('analist'));
    }

    public function storeQtyDetail(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam' => 'required',
            'nama_material' => 'required|string',
            'barang_masuk' => 'required|integer',
            'barang_keluar' => 'required|integer',
            'gambar' => 'nullable|image',
        ]);

        $analist = Analist::findOrFail($id);

        // Buat instance QtyDetail baru
        $qtyDetail = new QtyDetail();
        $qtyDetail->tanggal = $request->tanggal;
        $qtyDetail->jam = $request->jam;
        $qtyDetail->nama_material = $request->nama_material;
        $qtyDetail->barang_masuk = $request->barang_masuk;
        $qtyDetail->barang_keluar = $request->barang_keluar;

        // Simpan gambar jika diunggah
        if ($request->hasFile('gambar')) {
            $qtyDetail->gambar = $request->file('gambar')->store('uploads', 'public');
        }

        // Simpan qtyDetail ke analist
        $analist->qtyDetails()->save($qtyDetail);

        // Update total qty
        $totalQty = $analist->qtyDetails->sum('barang_masuk') - $analist->qtyDetails->sum('barang_keluar');
        $analist->qty = $totalQty;
        $analist->save();

        return redirect()
            ->route('analists.qtyDetail', ['id' => $id])
            ->with('success', 'Qty detail ditambahkan.');
    }

    public function editQtyDetail($id, $qtyDetailId)
    {
        $analist = Analist::findOrFail($id);
        $qtyDetail = $analist->qtyDetails()->findOrFail($qtyDetailId);
        return view('analists.editQtyDetail', compact('analist', 'qtyDetail'));
    }

    public function updateQtyDetail(Request $request, $id, $qtyDetailId)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam' => 'required',
            'nama_material' => 'required|string|max:255',
            'barang_masuk' => 'required|integer',
            'barang_keluar' => 'required|integer',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $analist = Analist::findOrFail($id);
        $qtyDetail = $analist->qtyDetails()->findOrFail($qtyDetailId);

        // Update qty detail
        $qtyDetail->update($request->all());

        // Update total qty jika perlu
        $totalQty = $analist->qtyDetails->sum('barang_masuk') - $analist->qtyDetails->sum('barang_keluar');
        $analist->qty = $totalQty;
        $analist->save();

        return redirect()
            ->route('analists.qtyDetail', ['id' => $id])
            ->with('success', 'Qty detail berhasil diperbarui.');
    }

    public function deleteQtyDetail($id, $qtyDetailId)
    {
        $analist = Analist::findOrFail($id);
        $qtyDetail = $analist->qtyDetails()->findOrFail($qtyDetailId);
        $qtyDetail->delete();

        // Update total qty setelah menghapus
        $totalQty = $analist->qtyDetails->sum('barang_masuk') - $analist->qtyDetails->sum('barang_keluar');
        $analist->qty = $totalQty;
        $analist->save();

        return redirect()
            ->route('analists.qtyDetail', ['id' => $id])
            ->with('success', 'Qty detail berhasil dihapus.');
    }
}
