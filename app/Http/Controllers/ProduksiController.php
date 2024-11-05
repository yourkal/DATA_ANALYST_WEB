<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;

class ProduksiController extends Controller
{
    public function index(Request $request)
    {
        $produksis = Produksi::paginate(10); // Pagination, sesuaikan dengan kebutuhan
        return view('produksi.index', compact('produksis'));
    }

    public function create()
    {
        return view('produksi.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'jam' => 'required|date_format:H:i', // Validasi format jam
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'nama_material' => 'required|string',
        'barang_masuk' => 'required|integer',
        'barang_keluar' => 'required|integer',
    ]);

    $produksi = new Produksi();
    $produksi->tanggal = $request->tanggal;
    $produksi->jam = $request->jam; // Menyimpan jam
    $produksi->nama_material = $request->nama_material;
    $produksi->barang_masuk = $request->barang_masuk;
    $produksi->barang_keluar = $request->barang_keluar;
    $produksi->jumlah_akhir = $produksi->barang_masuk - $produksi->barang_keluar;

    if ($request->hasFile('gambar')) {
        $fileName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('uploads'), $fileName);
        $produksi->gambar = $fileName;
    }

    $produksi->save();

    return redirect()->route('produksi.index');
}

    public function edit($id)
    {
        $produksi = Produksi::findOrFail($id);
        return view('produksi.edit', compact('produksi'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'tanggal' => 'required|date',
        'jam' => 'required|date_format:H:i', // Validasi format jam
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'nama_material' => 'required|string',
        'barang_masuk' => 'required|integer',
        'barang_keluar' => 'required|integer',
    ]);

    $produksi = Produksi::findOrFail($id);
    $produksi->tanggal = $request->tanggal;
    $produksi->jam = $request->jam; // Menyimpan jam
    $produksi->nama_material = $request->nama_material;
    $produksi->barang_masuk = $request->barang_masuk;
    $produksi->barang_keluar = $request->barang_keluar;
    $produksi->jumlah_akhir = $produksi->barang_masuk - $produksi->barang_keluar;

    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($produksi->gambar) {
            $path = public_path('uploads/' . $produksi->gambar);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $fileName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('uploads'), $fileName);
        $produksi->gambar = $fileName;
    }

    $produksi->save();

    return redirect()->route('produksi.index');
}

    public function destroy($id)
    {
        $produksi = Produksi::findOrFail($id);
        if ($produksi->gambar) {
            $path = public_path('uploads/' . $produksi->gambar);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        $produksi->delete();
        return redirect()->route('produksi.index');
    }
}
