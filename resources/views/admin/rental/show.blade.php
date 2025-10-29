@extends('layout-admin')

@section('content')
<div class="container-xxl">
    <h4 class="fw-bold mb-4">Detail Rental #{{ $rental->id }}</h4>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Penyewa:</strong> {{ $rental->user->nama ?? '-' }}</p>
            <p><strong>Mobil:</strong> {{ $rental->mobil->nama_mobil ?? '-' }}</p>
            <p><strong>Tanggal:</strong> {{ $rental->tanggal_mulai }} s/d {{ $rental->tanggal_selesai }}</p>
            <p><strong>Total Harga:</strong> Rp {{ number_format($rental->total_harga, 0, ',', '.') }}</p>
            <p><strong>Status:</strong> 
                <span class="badge bg-{{ 
                    $rental->status == 'selesai' ? 'success' : 
                    ($rental->status == 'berjalan' ? 'warning' : 
                    ($rental->status == 'pending' ? 'danger' : 
                    ($rental->status == 'dibayar' ? 'primary' : 'secondary'))) 
                }}">
                    {{ ucfirst($rental->status) }}
                </span>
            </p>
        </div>
    </div>

    <h5 class="fw-bold mb-3">Riwayat Pembayaran</h5>
    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Metode</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Tanggal Bayar</th>
                <th>Bukti</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rental->payments as $payment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ ucfirst($payment->metode_pembayaran) }}</td>
                <td>Rp {{ number_format($payment->jumlah, 0, ',', '.') }}</td>
                <td><span class="badge bg-success">{{ ucfirst($payment->status) }}</span></td>
                <td>{{ $payment->tanggal_bayar }}</td>
                <td>
                    @if($payment->bukti_pembayaran)
                        <img src="{{ asset('storage/' . $payment->bukti_pembayaran) }}" width="100" class="rounded shadow">
                    @else
                        -
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada pembayaran</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Tombol "Tambah Pembayaran" hanya muncul jika status masih pending --}}
    @if ($rental->status == 'pending')
        <a href="{{ route('admin.payment.create', $rental->id) }}" class="btn btn-success">Tambah Pembayaran</a>
    @endif

    <a href="{{ route('admin.rental') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
