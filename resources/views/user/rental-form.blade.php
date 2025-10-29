<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Rental - {{ $mobil->merk }} {{ $mobil->model }}</title>
    <style>
        /* CSS sama seperti sebelumnya */
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
        }

        .rental-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .car-summary {
            background-color: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
        }

        .car-summary img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .car-summary h2 {
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .car-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 20px;
        }

        .car-detail {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            color: #7f8c8d;
        }

        .car-detail i {
            margin-right: 8px;
        }

        .car-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: #3498db;
            margin-bottom: 20px;
        }

        .rental-form {
            background-color: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #2c3e50;
        }

        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
            outline: none;
            border-color: #3498db;
        }

        .date-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .btn {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .btn-block {
            width: 100%;
        }

        .info-box {
            background-color: #e8f4fd;
            border-left: 4px solid #3498db;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .info-box p {
            margin: 0;
            color: #2c3e50;
        }

        /* Footer */
        footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 60px 0 20px;
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
            }

            nav ul li {
                margin: 0 10px;
            }

            .rental-container {
                grid-template-columns: 1fr;
            }

            .date-group {
                grid-template-columns: 1fr;
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
                            <li><a href="{{ url('/rental/history') }}">Pesanan Saya</a></li>
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
            <div class="rental-container">
                <!-- Car Summary -->
                <div class="car-summary">
                    <img src="{{ asset('storage/' . $mobil->gambar) }}" alt="{{ $mobil->merk }} {{ $mobil->model }}">
                    <h2>{{ $mobil->merk }} {{ $mobil->model }}</h2>
                    <div class="car-price">Rp {{ number_format($mobil->harga_sewa_per_hari, 0, ',', '.') }}/hari</div>
                    <div class="car-details">
                        <div class="car-detail"><i>📅</i> {{ $mobil->tahun }}</div>
                        <div class="car-detail"><i>🎨</i> {{ $mobil->warna }}</div>
                        <div class="car-detail"><i>⛽</i> {{ $mobil->bahan_bakar }}</div>
                        <div class="car-detail"><i>👥</i> {{ $mobil->kapasitas_penumpang }} penumpang</div>
                        <div class="car-detail"><i>⚙️</i> {{ $mobil->transmisi }}</div>
                    </div>
                    <p class="car-description">{{ $mobil->deskripsi }}</p>
                </div>

                <!-- Rental Form -->
                <div class="rental-form">
                    <h2>Form Rental Mobil</h2>

                    <div class="info-box">
                        <p><strong>Informasi:</strong> Isi form rental dan lanjutkan ke halaman pembayaran.</p>
                    </div>

                    <form action="{{ route('rental.confirm') }}" method="GET">
                        <input type="hidden" name="mobil_id" value="{{ $mobil->id }}">

                        <div class="form-group date-group">
                            <div>
                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                <input type="date" id="tanggal_mulai" name="tanggal_mulai"
                                       min="{{ date('Y-m-d') }}" required>
                            </div>
                            <div>
                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input type="date" id="tanggal_selesai" name="tanggal_selesai"
                                       min="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no_telepon">No. Telepon</label>
                            <input type="tel" id="no_telepon" name="no_telepon"
                                   placeholder="Contoh: 081234567890"
                                   pattern="[0-9]{10,13}"
                                   title="Masukkan nomor telepon yang valid (10-13 digit)" required>
                        </div>

                        <button type="submit" class="btn btn-block" style="margin-top: 20px;">Lanjut</button>
                    </form>
                </div>
            </div>
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
