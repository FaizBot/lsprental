<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::all();
        return view('admin.mobil.index', compact('mobils'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk'        => 'required|string|max:50',
            'nama_mobil'  => 'required|string|max:100',
            'plat_nomor'  => 'required|string|max:20|unique:mobils',
            'warna'       => 'nullable|string|max:30',
            'tahun'       => 'nullable|integer|min:1900|max:' . date('Y'),
            'harga_sewa'  => 'required|numeric',
            'status'      => 'required|in:tersedia,disewa,maintenance',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('mobils', 'public');
        }

        Mobil::create($data);

        return redirect()->route('admin.mobil')->with('success', 'Mobil berhasil ditambahkan');
    }

    public function update(Request $request, Mobil $mobil)
    {
        $request->validate([
            'merk'        => 'required|string|max:50',
            'nama_mobil'  => 'required|string|max:100',
            'plat_nomor'  => 'required|string|max:20|unique:mobils,plat_nomor,' . $mobil->id,
            'warna'       => 'nullable|string|max:30',
            'tahun'       => 'nullable|integer|min:1900|max:' . date('Y'),
            'harga_sewa'  => 'required|numeric',
            'status'      => 'required|in:tersedia,disewa,maintenance',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($mobil->gambar && file_exists(storage_path('app/public/' . $mobil->gambar))) {
                unlink(storage_path('app/public/' . $mobil->gambar));
            }
            $data['gambar'] = $request->file('gambar')->store('mobils', 'public');
        }

        $mobil->update($data);

        return redirect()->route('admin.mobil')->with('success', 'Mobil berhasil diperbarui');
    }

    public function destroy(Mobil $mobil)
    {
        $mobil->delete();
        return redirect()->route('admin.mobil')->with('success', 'Mobil berhasil dihapus');
    }
}
