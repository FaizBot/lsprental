<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'no_hp',
        'alamat',
    ];

    protected $hidden = [
        'password',
    ];

    // Relasi: User bisa melakukan banyak rental
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
