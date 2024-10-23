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
        $datasiswa = Datasiswa::all();
        return view('pages.absensi.form', compact('datasiswa'));
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

        Dataabsen::create($request->only(['nis', 'namasiswa_id', 'jurusan', 'haritanggal', 'status', 'keterangan']));
        Riwayatabsensi::create($request->only(['nis', 'namasiswa_id', 'jurusan', 'haritanggal', 'status', 'keterangan']));
        Absensi::create($request->only(['nis', 'namasiswa_id', 'jurusan', 'haritanggal', 'status']));
        return redirect()->route('admin.form.index')->with('success', 'Kamu telah absen, silahkan cek riwayat absen.');
    }
}
