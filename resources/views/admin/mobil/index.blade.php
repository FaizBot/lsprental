@extends('layout-admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold mb-4">Daftar Mobil</h4>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMobilModal">
        <i class="bi bi-plus"></i> Tambah Mobil
    </button>

    <!-- Tabel Mobil -->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="tableMobil">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Merk</th>
                        <th>Nama Mobil</th>
                        <th>Plat Nomor</th>
                        <th>Warna</th>
                        <th>Tahun</th>
                        <th>Harga Sewa</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mobils as $m)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($m->gambar)
                                <img src="{{ asset('storage/' . $m->gambar) }}" width="80" class="rounded shadow-sm">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>{{ $m->merk }}</td>
                        <td>{{ $m->nama_mobil }}</td>
                        <td>{{ $m->plat_nomor }}</td>
                        <td>{{ $m->warna }}</td>
                        <td>{{ $m->tahun }}</td>
                        <td>Rp {{ number_format($m->harga_sewa, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge 
                                @if($m->status == 'tersedia') bg-success 
                                @elseif($m->status == 'disewa') bg-warning 
                                @else bg-secondary @endif">
                                {{ ucfirst($m->status) }}
                            </span>
                        </td>
                        <td>
                            <!-- Edit -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editMobilModal{{ $m->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>

                            <!-- Hapus -->
                            <form action="{{ route('admin.mobil.destroy', $m->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus mobil ini?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="editMobilModal{{ $m->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <form method="POST" action="{{ route('admin.mobil.update', $m->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Mobil</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label>Merk</label>
                                            <input type="text" name="merk" class="form-control" value="{{ $m->merk }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Nama Mobil</label>
                                            <input type="text" name="nama_mobil" class="form-control" value="{{ $m->nama_mobil }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Plat Nomor</label>
                                            <input type="text" name="plat_nomor" class="form-control" value="{{ $m->plat_nomor }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Warna</label>
                                            <input type="text" name="warna" class="form-control" value="{{ $m->warna }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>Tahun</label>
                                            <input type="number" name="tahun" class="form-control" value="{{ $m->tahun }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>Harga Sewa</label>
                                            <input type="number" name="harga_sewa" class="form-control" value="{{ $m->harga_sewa }}" step="0.01" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Gambar Mobil</label>
                                            <input type="file" name="gambar" class="form-control" accept="image/*">
                                            @if($m->gambar)
                                                <img src="{{ asset('storage/' . $m->gambar) }}" width="100" class="mt-2 rounded shadow">
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <select name="status" class="form-control" required>
                                                <option value="tersedia" {{ $m->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                                <option value="disewa" {{ $m->status == 'disewa' ? 'selected' : '' }}>Disewa</option>
                                                <option value="maintenance" {{ $m->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal Tambah -->
<div class="modal fade" id="addMobilModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.mobil.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Mobil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Merk</label>
                        <input type="text" name="merk" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama Mobil</label>
                        <input type="text" name="nama_mobil" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Plat Nomor</label>
                        <input type="text" name="plat_nomor" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Warna</label>
                        <input type="text" name="warna" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Tahun</label>
                        <input type="number" name="tahun" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Harga Sewa</label>
                        <input type="number" name="harga_sewa" class="form-control" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label>Gambar Mobil</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="tersedia">Tersedia</option>
                            <option value="disewa">Disewa</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $('#tableMobil').DataTable({
        responsive: true,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
        },
        columnDefs: [
            { orderable: false, targets: [8] } // kolom "Aksi" jangan bisa di-sort
        ]
    });
});
</script>
@endpush
