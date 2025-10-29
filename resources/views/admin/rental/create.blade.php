@extends('layout-admin')

@section('content')
<div class="container-xxl">
    <h4 class="fw-bold mb-4">Tambah Rental</h4>

    <form action="{{ route('admin.rental.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Mobil</label>
            <select name="mobil_id" class="form-control" required>
                <option value="">-- Pilih Mobil --</option>
                @foreach($mobils as $mobil)
                    <option value="{{ $mobil->id }}">
                        {{ $mobil->nama_mobil }} - {{ $mobil->tahun }} (Rp {{ number_format($mobil->harga_sewa, 0, ',', '.') }}/hari)
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.rental') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
