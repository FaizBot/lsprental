@extends('layout-admin')

@section('content')
<div class="container-xxl">
    <h4 class="fw-bold mb-4">Daftar Pembayaran</h4>

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Rental</th>
                <th>Metode</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Bukti</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $payment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>#{{ $payment->rental_id }}</td>
                <td>{{ ucfirst($payment->metode_pembayaran) }}</td>
                <td>Rp {{ number_format($payment->jumlah, 0, ',', '.') }}</td>
                <td><span class="badge bg-success">{{ $payment->status }}</span></td>
                <td>{{ $payment->tanggal_bayar }}</td>
                <td>
                    @if($payment->bukti_pembayaran)
                        <img src="{{ asset('storage/'.$payment->bukti_pembayaran) }}" width="80" class="rounded">
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.payment.show', $payment->id) }}" class="btn btn-sm btn-info">Lihat</a>
                    <form action="{{ route('admin.payment.destroy', $payment->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus pembayaran ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="8" class="text-center">Belum ada data pembayaran</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
