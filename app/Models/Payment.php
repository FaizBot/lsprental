<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'rental_id',
        'metode_pembayaran',
        'jumlah',
        'status',
        'bukti_pembayaran',
        'tanggal_bayar'
    ];

    // Relasi ke Rental
    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
