<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Halaman dashboard mahasiswa (hanya ucapan selamat datang)
    public function dashboard()
    {
        return view('mahasiswa.dashboard-mahasiswa');
    }

    // Menampilkan semua jadwal kosong
    public function lihatJadwal()
    {
        $jadwals = Jadwal::with('dosen')
            ->whereDoesntHave('booking') // hanya yang belum dibooking
            ->orderBy('tanggal')
            ->get();

        return view('mahasiswa.lihat-jadwal', ['jadwals' => $jadwals]);
    }

    // Simpan booking
    public function store(Request $request)
    {
        $request->validate([
            'jadwal_id' => 'required|exists:jadwals,id',
        ]);

        // Cek apakah mahasiswa sudah pernah booking
        $existing = Booking::where('mahasiswa_id', Auth::id())->first();
        if ($existing) {
            return redirect()->back()->with('error', 'Kamu sudah booking jadwal.');
        }

        $jadwal = Jadwal::find($request->jadwal_id);
        if (!$jadwal || $jadwal->booking) {
            return redirect()->back()->with('error', 'Jadwal sudah tidak tersedia.');
        }

        Booking::create([
            'mahasiswa_id' => Auth::id(),
            'jadwal_id' => $request->jadwal_id,
        ]);

        return redirect()->back()->with('success', 'Booking berhasil dikirim.');
    }
}
