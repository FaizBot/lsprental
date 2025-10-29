@extends('layout-admin')

@section('content')
<div class="container-xxl">
    <h4 class="fw-bold mb-4">Daftar Rental</h4>

    <a href="{{ route('admin.rental.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus"></i> Tambah Rental
    </a>

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Mobil</th>
                <th>Penyewa</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rentals as $rental)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $rental->mobil->nama_mobil ?? '-' }}</td>
                <td>{{ $rental->user->nama ?? '-' }}</td>
                <td>{{ $rental->tanggal_mulai }} s/d {{ $rental->tanggal_selesai }}</td>
                <td>Rp {{ number_format($rental->total_harga, 0, ',', '.') }}</td>
                <td>
                    <span class="badge bg-{{ 
                        $rental->status == 'selesai' ? 'success' : 
                        ($rental->status == 'berjalan' ? 'warning' : 
                        ($rental->status == 'pending' ? 'danger' : 
                        ($rental->status == 'dibayar' ? 'primary' : 'secondary'))) 
                    }}">
                        {{ ucfirst($rental->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.rental.show', $rental->id) }}" class="btn btn-sm btn-info">Detail</a>

                    {{-- Tampilkan tombol Bayar hanya jika status masih "pending" --}}
                    @if ($rental->status == 'pending')
                        <a href="{{ route('admin.payment.create', $rental->id) }}" class="btn btn-sm btn-success">Bayar</a>
                    @endif

                    <form action="{{ route('admin.rental.destroy', $rental->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus rental ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data rental</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
