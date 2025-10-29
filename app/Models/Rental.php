<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mobil_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'total_harga',
        'status',
    ];

    // Relasi ke User (customer)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Mobil
    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    // Relasi ke Payment
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
