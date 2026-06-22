<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jadwal;
use App\Models\User;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['jadwal_id', 'mahasiswa_id'];

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
