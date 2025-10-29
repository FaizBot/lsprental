@extends('layout-admin')
@section('content')
<div class="container-xxl">
    <h4 class="fw-bold mb-4">Detail Pembayaran #{{ $payment->id }}</h4>

    <div class="card">
        <div class="card-body">
            <p><strong>Rental ID:</strong> {{ $payment->rental_id }}</p>
            <p><strong>Metode:</strong> {{ ucfirst($payment->metode_pembayaran) }}</p>
            <p><strong>Jumlah:</strong> Rp {{ number_format($payment->jumlah, 0, ',', '.') }}</p>
            <p><strong>Status:</strong> <span class="badge bg-success">{{ ucfirst($payment->status) }}</span></p>
            <p><strong>Tanggal Bayar:</strong> {{ $payment->tanggal_bayar }}</p>

            @if($payment->bukti_pembayaran)
                <p><strong>Bukti Pembayaran:</strong></p>
                <img src="{{ asset('storage/'.$payment->bukti_pembayaran) }}" width="300" class="rounded shadow">
            @endif
        </div>
    </div>

    <a href="{{ route('admin.payment') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
