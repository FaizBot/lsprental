<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'merk',
        'gambar',
        'nama_mobil',
        'plat_nomor',
        'warna',
        'tahun',
        'harga_sewa',
        'status',
    ];

    // Relasi: 1 mobil bisa punya banyak rental
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
