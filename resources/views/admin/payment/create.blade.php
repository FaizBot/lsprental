@extends('layout-admin')

@section('content')
<div class="container-xxl">
    <h4 class="fw-bold mb-4">Tambah Pembayaran untuk Rental #{{ $rental->id }}</h4>

    <form action="{{ route('admin.payment.store', $rental->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Metode Pembayaran</label>
            <select name="metode_pembayaran" class="form-control" required>
                <option value="">-- Pilih Metode --</option>
                <option value="cash">Cash</option>
                <option value="transfer">Transfer</option>
                <option value="ewallet">E-Wallet</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Total Bayar (otomatis)</label>
            <input type="text" class="form-control" value="Rp {{ number_format($rental->total_harga, 0, ',', '.') }}" readonly>
            <input type="hidden" name="jumlah" value="{{ $rental->total_harga }}">
        </div>

        <div class="mb-3">
            <label>Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.rental.show', $rental->id) }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
