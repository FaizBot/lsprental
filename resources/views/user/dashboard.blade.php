<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil - Solusi Transportasi Anda</title>
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

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(44, 62, 80, 0.8), rgba(44, 62, 80, 0.8)), url('https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
        }

        .btn {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 12px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        /* Filter Section */
        .filter-section {
            background-color: #fff;
            padding: 30px 0;
            margin: 40px 0;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .filter-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
        }

        .filter-item {
            display: flex;
            flex-direction: column;
        }

        .filter-item label {
            margin-bottom: 5px;
            font-weight: 500;
            color: #2c3e50;
        }

        .filter-item select, .filter-item input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            min-width: 150px;
        }

        /* Cars Section */
        .section-title {
            text-align: center;
            margin: 60px 0 40px;
            color: #2c3e50;
        }

        .section-title h2 {
            font-size: 2.2rem;
            margin-bottom: 10px;
        }

        .section-title p {
            color: #7f8c8d;
            max-width: 600px;
            margin: 0 auto;
        }

        .cars-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }

        .car-card {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .car-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        .car-image {
            height: 200px;
            overflow: hidden;
        }

        .car-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .car-card:hover .car-image img {
            transform: scale(1.05);
        }

        .car-info {
            padding: 20px;
        }

        .car-title {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .car-title h3 {
            font-size: 1.3rem;
            color: #2c3e50;
        }

        .car-price {
            font-weight: 700;
            color: #3498db;
            font-size: 1.2rem;
        }

        .car-details {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 15px 0;
            font-size: 0.9rem;
            color: #7f8c8d;
        }

        .car-detail {
            display: flex;
            align-items: center;
        }

        .car-detail i {
            margin-right: 5px;
        }

        .car-description {
            color: #7f8c8d;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .car-status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-available {
            background-color: #d5f4e6;
            color: #27ae60;
        }

        .status-unavailable {
            background-color: #fadbd8;
            color: #e74c3c;
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

            .hero h1 {
                font-size: 2.2rem;
            }

            .filter-container {
                flex-direction: column;
                align-items: center;
            }

            .filter-item {
                width: 100%;
                max-width: 300px;
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
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#cars">Daftar Mobil</a></li>
                        <li><a href="#contact">Kontak</a></li>
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

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <h1>Sewa Mobil Berkualitas dengan Harga Terjangkau</h1>
            <p>Kami menyediakan berbagai jenis mobil untuk kebutuhan perjalanan Anda. Dari mobil keluarga hingga mobil mewah, semua tersedia dengan kondisi terbaik.</p>
            <a href="#cars" class="btn">Lihat Daftar Mobil</a>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="filter-section">
        <div class="container">
            <form action="#" method="get">
                <div class="filter-container">
                    <div class="filter-item">
                        <label for="merk">Merk</label>
                        <select id="merk" name="merk">
                            <option value="all">Semua Merk</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Honda">Honda</option>
                            <option value="Suzuki">Suzuki</option>
                            <option value="Mitsubishi">Mitsubishi</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label for="transmisi">Transmisi</label>
                        <select id="transmisi" name="transmisi">
                            <option value="all">Semua Transmisi</option>
                            <option value="manual">Manual</option>
                            <option value="automatic">Automatic</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label for="bahan-bakar">Bahan Bakar</label>
                        <select id="bahan-bakar" name="bahan-bakar">
                            <option value="all">Semua Bahan Bakar</option>
                            <option value="Bensin">Bensin</option>
                            <option value="Solar">Solar</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label for="harga">Harga Maksimum</label>
                        <input type="number" id="harga" name="harga" placeholder="Masukkan harga maksimum">
                    </div>
                    <div class="filter-item" style="align-self: flex-end;">
                        <button type="submit" class="btn" style="padding: 10px 20px;">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Cars Section -->
    <section id="cars">
        <div class="container">
            <div class="section-title">
                <h2>Daftar Mobil Tersedia</h2>
                <p>Pilih mobil sesuai kebutuhan perjalanan Anda. Semua mobil kami dalam kondisi prima dan siap digunakan.</p>
            </div>

            <div class="cars-grid">
    @foreach ($mobils as $mobil)
    <div class="car-card">
        <div class="car-image">
            <img src="{{ asset('storage/' . $mobil->gambar) }}" alt="{{ $mobil->merk }} {{ $mobil->model }}">
        </div>
        <div class="car-info">
            <div class="car-title">
                <h3>{{ $mobil->merk }} {{ $mobil->model }}</h3>
                <div class="car-price">Rp {{ number_format($mobil->harga_sewa_per_hari, 0, ',', '.') }}/hari</div>
            </div>
            <div class="car-details">
                <div class="car-detail"><i>📅</i> {{ $mobil->tahun }}</div>
                <div class="car-detail"><i>🎨</i> {{ $mobil->warna }}</div>
                <div class="car-detail"><i>⛽</i> {{ $mobil->bahan_bakar }}</div>
                <div class="car-detail"><i>👥</i> {{ $mobil->kapasitas_penumpang }} penumpang</div>
                <div class="car-detail"><i>⚙️</i> {{ $mobil->transmisi }}</div>
            </div>
            <p class="car-description">{{ $mobil->deskripsi }}</p>
            <span class="car-status status-available">Tersedia</span>
            <a href="{{ route('rental.form', $mobil->id) }}" class="btn" style="margin-top: 10px; display: inline-block;">Sewa Sekarang</a>
        </div>
    </div>
    @endforeach
</div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
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
