<?php

namespace App\Http\Controllers;

use App\Models\Dataabsen;
use App\Models\Riwayatabsensi;
use App\Models\Absensi;
use App\Models\Datasiswa;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $datasiswa = Datasiswa::all(); // Mengambil semua data siswa
        return view('pages.absensi.form', compact('datasiswa')); // Mengirim data absensi yang telah dibuat ke dalam tampilan
    }

    public function store(Request $request)
    {
        $request->validate([
           'nis' => 'required',
           'namasiswa_id' => 'required',
           'jurusan' => 'required',
           'haritanggal' => 'required',
           'status' => 'required|in:Hadir,Izin,Sakit',
           'keterangan' => 'required',
        ],[
            'nis.required' => 'NIS harus diisi',
            'namasiswa_id.required' => 'Nama harus diisi',
            'jurusan.required' => 'Jurusan harus diisi',
            'haritanggal.required' => 'Hari Tanggal harus diisi',
            'status.required' => 'Status harus diisi',
            'keterangan.required' => 'Keterangan harus diisi'
        ]);

        Dataabsen::create($request->only(['nis', 'namasiswa_id', 'jurusan', 'haritanggal', 'status', 'keterangan'])); // Membuat data absen
        Riwayatabsensi::create($request->only(['nis', 'namasiswa_id', 'jurusan', 'haritanggal', 'status', 'keterangan'])); // Membuat data riwayat absen
        return redirect()->route('admin.form.index')->with('success', 'Kamu telah absen, silahkan cek riwayat absen.'); // Mengarahkan ke halaman riwayat absen
    }
}
