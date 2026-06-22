<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Booking;

class JadwalController extends Controller
{
    public function create()
{
    $jadwals = Jadwal::where('dosen_id', auth()->id())->latest()->get();
    return view('dosen.atur-jadwal', compact('jadwals'));
}

    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'jam' => 'required',
        'nama_bimbingan' => 'required|string|max:255', // ✅ validasi nama bimbingan
    ]);

    Jadwal::create([
        'dosen_id' => auth()->id(),
        'tanggal' => $request->tanggal,
        'jam' => $request->jam,
        'nama_bimbingan' => $request->nama_bimbingan, // ✅ simpan ke database
    ]);

    return redirect()->route('jadwal.form')->with('success', 'Jadwal berhasil ditambahkan.');
}

public function edit($id)
{
    $jadwal = Jadwal::findOrFail($id);
    if ($jadwal->dosen_id !== auth()->id()) abort(403);
    return view('dosen.edit-jadwal', compact('jadwal'));
}

public function update(Request $request, $id)
{
    $jadwal = Jadwal::findOrFail($id);
    if ($jadwal->dosen_id !== auth()->id()) abort(403);

    $request->validate([
        'tanggal' => 'required|date',
        'jam' => 'required',
        'nama_bimbingan' => 'required|string|max:255',
    ]);

    $jadwal->update($request->all());

    return redirect()->route('jadwal.form')->with('success', 'Jadwal berhasil diperbarui');
}

public function destroy($id)
{
    $jadwal = Jadwal::findOrFail($id);
    if ($jadwal->dosen_id !== auth()->id()) abort(403);

    $jadwal->delete();

    return redirect()->route('jadwal.form')->with('success', 'Jadwal berhasil dihapus');
}
    public function formJadwal()
    {
        return view('dosen.atur-jadwal');
    }

    public function daftarBooking()
    {
        $dosenId = auth()->id();
        $jadwals = Jadwal::where('dosen_id', $dosenId)->with('bookings.mahasiswa')->get();
        return view('dosen.booking-dosen', compact('jadwals'));
    }

    public function dashboard()
{
    $dosenId = auth()->id();

    $totalJadwal = Jadwal::where('dosen_id', $dosenId)->count();

    $totalBooking = Booking::whereHas('jadwal', function ($query) use ($dosenId) {
        $query->where('dosen_id', $dosenId);
    })->count();

    $totalMahasiswa = Booking::whereHas('jadwal', function ($query) use ($dosenId) {
        $query->where('dosen_id', $dosenId);
    })->distinct('mahasiswa_id')->count('mahasiswa_id');

    return view('dosen.dashboard-dosen', compact('totalJadwal', 'totalBooking', 'totalMahasiswa'));
}


}


