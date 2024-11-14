<?php

namespace App\Http\Controllers;

use App\Models\Dataabsen;
use App\Models\Datasiswa;
use App\Models\Riwayatabsensi;
use Illuminate\Http\Request;

class RiwayatabsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riwayatabsensi = Riwayatabsensi::with('datasiswa')
            ->orderBy('updated_at', 'DESC')
            ->get(); //mengambil data dan mengurutkannya berdasarkan kolom created_at dalam urutan descending (terbaru ke terlama)
        
        return view('pages.riwayatabsensi.index', compact('riwayatabsensi')); //mengirim riwayat absensi yang telah dibuat ke dalam tampilan
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $riwayatabsensi = Riwayatabsensi::find($id); //mengambil riwayat absensi berdasarkan id
        return view('pages.riwayatabsensi.show', compact('riwayatabsensi')); //mengirim riwayat absensi yang telah dibuat ke dalam tampilan
    }

    /**
     * Remove the specified resource from storage.
     */
    public function edit(string $id)
    {
        $riwayatabsensi = Riwayatabsensi::find($id); //mengambil riwayat absensi berdasarkan id
        $datasiswa = Datasiswa::all(); // Mengambil semua data siswa
        return view ('pages.riwayatabsensi.edit', compact('riwayatabsensi','datasiswa')); //mengirim riwayat absensi yang telah dibuat ke dalam tampilan
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nis' => 'required',
           'namasiswa_id' => 'required',
           'jurusan' => 'required',
           'haritanggal' => 'required',
           'status' => 'required',
           'keterangan' => 'required',
        ],[
            'nis.required' => 'NIS harus diisi',
            'namasiswa_id.required' => 'Nama harus diisi',
            'jurusan.required' => 'Jurusan harus diisi',
            'haritanggal.required' => 'Haritanggal harus diisi',
            'status.required' => 'Status harus diisi',
            'keterangan.required' => 'Keterangan harus diisi'
        ]);
        
        $riwayatabsensi = Riwayatabsensi::find($id); //mengambil riwayat absensi berdasarkan id
        $riwayatabsensi->update($request->all()); // Perbarui riwayat absensi

        $dataabsen = Dataabsen::where('nis', $request->nis)
        ->where('haritanggal', $request->haritanggal)
        ->first(); //mengambil riwayat absensi berdasarkan nis dan haritanggal
            if ($dataabsen) {
                $dataabsen->update([
                    'nis' => $request->nis,
                    'namasiswa_id' => $request->namasiswa_id,
                    'jurusan' => $request->jurusan,
                    'haritanggal' => $request->haritanggal,
                    'status' => $request->status,
                    'keterangan' => $request->keterangan,
                ]); // Perbarui riwayat absensi
            }

        return redirect('admin/riwayatabsensi'); //mengarahkan ke halaman riwayat absensi
    }
}
