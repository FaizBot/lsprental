<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mobil;
use App\Models\Rental;
use App\Models\Payment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'nama' => 'Admin Rental',
            'email' => 'admin@rental.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'no_hp' => '08123456789',
            'alamat' => 'Jl. Raya Admin No.1',
        ]);

        // Customer contoh
        User::create([
            'nama' => 'Budi Santoso',
            'email' => 'budi@rental.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'no_hp' => '081298765432',
            'alamat' => 'Jl. Mawar No.5',
        ]);

        User::create([
            'nama' => 'Siti Aminah',
            'email' => 'siti@rental.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'no_hp' => '081377788899',
            'alamat' => 'Jl. Melati No.10',
        ]);

        Mobil::create([
            'gambar' => null,
            'nama_mobil' => 'Avanza',
            'merk' => 'Toyota',
            'plat_nomor' => 'B 1234 CD',
            'warna' => 'Hitam',
            'tahun' => 2020,
            'harga_sewa' => 350000,
            'status' => 'tersedia',
        ]);

        Mobil::create([
            'gambar' => null,
            'nama_mobil' => 'Xenia',
            'merk' => 'Daihatsu',
            'plat_nomor' => 'B 5678 EF',
            'warna' => 'Putih',
            'tahun' => 2019,
            'harga_sewa' => 300000,
            'status' => 'tersedia',
        ]);

        Mobil::create([
            'gambar' => null,
            'nama_mobil' => 'Innova',
            'merk' => 'Toyota',
            'plat_nomor' => 'B 9999 GH',
            'warna' => 'Abu-abu',
            'tahun' => 2021,
            'harga_sewa' => 500000,
            'status' => 'tersedia',
        ]);
    }
}
