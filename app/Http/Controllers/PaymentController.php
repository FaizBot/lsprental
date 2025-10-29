<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    // Admin
    public function admin_create(Rental $rental)
    {
        return view('admin.payment.create', compact('rental'));
    }

    public function admin_store(Request $request, Rental $rental)
    {
        $request->validate([
            'metode_pembayaran' => 'required|in:cash,transfer,ewallet',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = null;

        try {
            if ($request->hasFile('bukti_pembayaran')) {
                $file = $request->file('bukti_pembayaran');

                if ($file->isValid()) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $path = Storage::disk('public')->putFileAs('payments', $file, $fileName);
                    Log::info('UPLOAD INFO: stored path', ['path' => $path]);
                } else {
                    Log::warning('UPLOAD WARNING: file not valid', ['error' => $file->getError()]);
                }
            } else {
                Log::debug('UPLOAD DEBUG: no file present in request');
            }

            $tgl_byr = Carbon::now();
            
            Payment::create([
                'rental_id' => $rental->id,
                'metode_pembayaran' => $request->metode_pembayaran,
                'jumlah' => $rental->total_harga,
                'status' => 'lunas',
                'bukti_pembayaran' => $path,
                'tanggal_bayar' => $tgl_byr,
            ]);

            $rental->update(['status' => 'dibayar']);
            $rental->mobil->update(['status' => 'disewa']);

            return redirect()->route('admin.rental.show', $rental->id)
                ->with('success', 'Pembayaran berhasil disimpan!');
        } catch (\Throwable $e) {
            Log::error('UPLOAD ERROR in admin_store: ' . $e->getMessage(), [
                'exception' => $e,
                'request_files' => array_keys($request->files->all()),
            ]);
            return back()->withInput()->withErrors(['bukti_pembayaran' => 'Terjadi kesalahan saat upload: ' . $e->getMessage()]);
        }
    }

    public function admin_index()
    {
        $payments = Payment::with('rental.mobil', 'rental.user')->latest()->get();
        return view('admin.payment.index', compact('payments'));
    }

    public function admin_show(Payment $payment)
    {
        $payments = Payment::where('rental_id', $payment->id)->get();
        return view('admin.payment.show', compact('payment'));
    }

    public function admin_edit(Payment $payment)
    {
        return view('admin.payment.edit', compact('payment'));
    }

    public function admin_update(Request $request, Payment $payment)
    {
        $request->validate([
            'status' => 'required|in:pending,lunas',
        ]);

        $payment->update(['status' => $request->status]);

        return redirect()->route('admin.payment')->with('success', 'Status pembayaran diperbarui!');
    }

    public function admin_destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('admin.payment')->with('success', 'Pembayaran berhasil dihapus.');
    }

    // Customer
    public function index()
    {
        $payments = Payment::with('rental')->latest()->get();
        return view('admin.payment.index', compact('payments'));
    }

    public function create(Rental $rental)
    {
        return view('admin.payment.create', compact('rental'));
    }

    public function store(Request $request, $rentalId)
    {
        $rental = Rental::findOrFail($rentalId);

        $request->validate([
            'metode_pembayaran' => 'required|in:cash,transfer,ewallet',
            'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload bukti pembayaran
        $path = $request->file('bukti_pembayaran')->store('payments', 'public');

        Payment::create([
            'rental_id' => $rental->id,
            'metode_pembayaran' => $request->metode_pembayaran,
            'jumlah' => $request->jumlah,
            'status' => 'lunas',
            'bukti_pembayaran' => $path,
        ]);

        $rental->update(['status' => 'berjalan']);

        return redirect()->route('admin.rental')->with('success', 'Pembayaran berhasil!');
    }
}
