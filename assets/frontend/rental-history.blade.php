<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pesanan Saya - RentalMobil</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #2c3e50;
        }

        .logo span {
            color: #3498db;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 30px;
        }

        nav ul li a {
            text-decoration: none;
            color: #2c3e50;
            font-weight: 500;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #3498db;
        }

        /* Main Content */
        .main-content {
            padding: 40px 0;
            min-height: 70vh;
        }

        .page-title {
            margin-bottom: 30px;
            color: #2c3e50;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .rental-list {
            display: grid;
            gap: 20px;
        }

        .rental-card {
            background-color: #fff;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .rental-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        .rental-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .car-info {
            display: flex;
            align-items: center;
        }

        .car-image {
            width: 120px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 15px;
        }

        .car-details h3 {
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .car-details p {
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        .rental-status {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-dikonfirmasi {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        .status-berjalan {
            background-color: #d4edda;
            color: #155724;
        }

        .status-selesai {
            background-color: #e2e3e5;
            color: #383d41;
        }

        .status-batal {
            background-color: #f8d7da;
            color: #721c24;
        }

        .payment-status {
            font-size: 0.85rem;
            color: #7f8c8d;
        }

        .payment-menunggu {
            color: #e74c3c;
            font-weight: 600;
        }

        .payment-lunas {
            color: #27ae60;
            font-weight: 600;
        }

        .payment-ditolak {
            color: #e74c3c;
            font-weight: 600;
        }

        .rental-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
        }

        .detail-label {
            font-size: 0.85rem;
            color: #7f8c8d;
            margin-bottom: 5px;
        }

        .detail-value {
            font-weight: 500;
            color: #2c3e50;
        }

        .total-price {
            font-size: 1.2rem;
            font-weight: 700;
            color: #3498db;
        }

        .bukti-transfer {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .bukti-image {
            max-width: 200px;
            max-height: 150px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #7f8c8d;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #bdc3c7;
        }

        .empty-state h3 {
            margin-bottom: 10px;
            color: #95a5a6;
        }

        .btn {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        /* Footer */
        footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 60px 0 20px;
            margin-top: 60px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-column h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #3498db;
        }

        .footer-column p, .footer-column a {
            color: #bdc3c7;
            margin-bottom: 10px;
            display: block;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-column a:hover {
            color: #3498db;
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #34495e;
            color: #95a5a6;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
            }

            nav ul {
                margin-top: 20px;
                flex-wrap: wrap;
                justify-content: center;
            }

            nav ul li {
                margin: 5px 10px;
            }

            .rental-header {
                flex-direction: column;
            }

            .rental-status {
                align-items: flex-start;
                margin-top: 15px;
            }

            .car-info {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">Rental<span>Mobil</span></div>
                <nav>
                    <ul>
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="{{ url('/#cars') }}">Daftar Mobil</a></li>
                        <li><a href="{{ url('/#contact') }}">Kontak</a></li>
                        @if (Auth::check())
                            <li><a href="{{ url('/rental/history') }}" class="active">Pesanan Saya</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <h1 class="page-title">Status Pesanan Saya</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($rentals->count() > 0)
                <div class="rental-list">
                    @foreach($rentals as $rental)
                        <div class="rental-card">
                            <div class="rental-header">
                                <div class="car-info">
                                    <img src="{{ asset('storage/' . $rental->mobil->gambar) }}"
                                         alt="{{ $rental->mobil->merk }} {{ $rental->mobil->model }}"
                                         class="car-image">
                                    <div class="car-details">
                                        <h3>{{ $rental->mobil->merk }} {{ $rental->mobil->model }}</h3>
                                        <p>Tahun: {{ $rental->mobil->tahun }} | Warna: {{ $rental->mobil->warna }}</p>
                                    </div>
                                </div>
                                <div class="rental-status">
                                    <span class="status-badge status-{{ $rental->status }}">
                                        @if($rental->status == 'pending')
                                            Menunggu Konfirmasi
                                        @elseif($rental->status == 'dikonfirmasi')
                                            Dikonfirmasi
                                        @elseif($rental->status == 'berjalan')
                                            Sedang Berjalan
                                        @elseif($rental->status == 'selesai')
                                            Selesai
                                        @else
                                            Dibatalkan
                                        @endif
                                    </span>
                                    <span class="payment-status payment-{{ $rental->status_pembayaran }}">
                                        @if($rental->status_pembayaran == 'menunggu')
                                            Menunggu Verifikasi Pembayaran
                                        @elseif($rental->status_pembayaran == 'lunas')
                                            Pembayaran Lunas
                                        @else
                                            Pembayaran Ditolak
                                        @endif
                                    </span>
                                </div>
                            </div>

                            <div class="rental-details">
                                <div class="detail-item">
                                    <span class="detail-label">Tanggal Mulai</span>
                                    <span class="detail-value">{{ \Carbon\Carbon::parse($rental->tanggal_mulai)->format('d M Y') }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Tanggal Selesai</span>
                                    <span class="detail-value">{{ \Carbon\Carbon::parse($rental->tanggal_selesai)->format('d M Y') }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Durasi</span>
                                    <span class="detail-value">{{ $rental->durasi_hari }} hari</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">No. Telepon</span>
                                    <span class="detail-value">{{ $rental->no_telepon }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Total Harga</span>
                                    <span class="detail-value total-price">Rp {{ number_format($rental->total_harga, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            @if($rental->bukti_transfer)
                                <div class="bukti-transfer">
                                    <span class="detail-label">Bukti Transfer:</span>
                                    <div style="margin-top: 10px;">
                                        <img src="{{ asset('storage/' . $rental->bukti_transfer) }}"
                                             alt="Bukti Transfer"
                                             class="bukti-image">
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i>🚗</i>
                    <h3>Belum ada pesanan</h3>
                    <p>Anda belum melakukan pemesanan rental mobil.</p>
                    <a href="{{ url('/') }}" class="btn" style="margin-top: 15px;">Rental Mobil Sekarang</a>
                </div>
            @endif
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Tentang Kami</h3>
                    <p>Kami adalah perusahaan rental mobil terpercaya yang telah melayani pelanggan selama lebih dari 10 tahun. Komitmen kami adalah memberikan pelayanan terbaik dengan armada mobil yang berkualitas.</p>
                </div>
                <div class="footer-column">
                    <h3>Kontak Kami</h3>
                    <p>Jl. Contoh No. 123, Jakarta</p>
                    <p>Telepon: (021) 1234-5678</p>
                    <p>Email: info@rentalmobil.com</p>
                </div>
                <div class="footer-column">
                    <h3>Jam Operasional</h3>
                    <p>Senin - Jumat: 08.00 - 17.00</p>
                    <p>Sabtu: 08.00 - 15.00</p>
                    <p>Minggu: Tutup</p>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 RentalMobil. Semua Hak Dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html>
