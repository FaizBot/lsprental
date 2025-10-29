<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Mobil;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    // Admin
    public function admin_index()
    {
        $rentals = Rental::with('mobil', 'user')->latest()->get();
        return view('admin.rental.index', compact('rentals'));
    }

    public function admin_create()
    {
        $mobils = Mobil::where('status', 'tersedia')->get();
        return view('admin.rental.create', compact('mobils'));
    }

    public function admin_store(Request $request)
    {
        $request->validate([
            'mobil_id' => 'required|exists:mobils,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $mobil = Mobil::findOrFail($request->mobil_id);
        $lama = (strtotime($request->tanggal_selesai) - strtotime($request->tanggal_mulai)) / 86400 + 1;
        $total = $lama * $mobil->harga_sewa;

        $rental = Rental::create([
            'user_id' => Auth::id(),
            'mobil_id' => $mobil->id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'total_harga' => $total,
            'status' => 'pending',
        ]);

        return redirect()->route('admin.rental.show', $rental->id)->with('success', 'Rental berhasil ditambahkan!');
    }

    public function admin_show(Rental $rental)
    {
        $rental->load('mobil', 'user', 'payments');
        return view('admin.rental.show', compact('rental'));
    }

    public function admin_edit(Rental $rental)
    {
        $mobils = Mobil::all();
        return view('admin.rental.edit', compact('rental', 'mobils'));
    }

    public function admin_update(Request $request, Rental $rental)
    {
        $request->validate([
            'status' => 'required|in:pending,berjalan,selesai,batal',
        ]);

        $rental->update(['status' => $request->status]);

        // Jika selesai → mobil kembali tersedia
        if ($request->status == 'selesai') {
            $rental->mobil->update(['status' => 'tersedia']);
        }

        return redirect()->route('admin.rental')->with('success', 'Status rental berhasil diperbarui.');
    }

    public function admin_destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->route('admin.rental')->with('success', 'Rental berhasil dihapus.');
    }

    // Customer
    public function index()
    {
        // $rentals = Rental::with(['user', 'mobil'])->latest()->get();
        $rentals = Rental::all();
        return view('admin.rental.index', compact('rentals'));
    }

    public function create()
    {
        $mobils = Mobil::all();
        return view('admin.rental.create', compact('mobils'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mobil_id' => 'required|exists:mobils,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $mobil = Mobil::findOrFail($request->mobil_id);

        // hitung lama sewa
        $totalHari = Carbon::parse($request->tanggal_mulai)
            ->diffInDays(Carbon::parse($request->tanggal_selesai)) + 1;

        // hitung total harga
        $totalHarga = $mobil->harga_sewa * $totalHari;

        Rental::create([
            'user_id' => Auth::id(), // jika login user
            'mobil_id' => $mobil->id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'total_harga' => $totalHarga,
            'status' => 'pending',
        ]);

        return redirect()->route('admin.rental')->with('success', 'Rental berhasil ditambahkan!');
    }

    public function show(Rental $rental)
    {
        return view('admin.rental.show', compact('rental'));
    }
}
