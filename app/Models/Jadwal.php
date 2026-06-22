<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Booking;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'dosen_id',
        'tanggal',
        'jam',
        'nama_bimbingan', 
    ];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
