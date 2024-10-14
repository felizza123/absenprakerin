<?php

namespace App\Http\Controllers;

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
            ->get();
        
        return view('pages.riwayatabsensi.index', compact('riwayatabsensi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $riwayatabsensi = Riwayatabsensi::find($id);
        return view('pages.riwayatabsensi.show', compact('riwayatabsensi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function edit(string $id)
    {
        $riwayatabsensi = Riwayatabsensi::find($id);
        $datasiswa = Datasiswa::all();
        return view ('pages.riwayatabsensi.edit', compact('riwayatabsensi','datasiswa'));
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
        
        $riwayatabsensi = Riwayatabsensi::find($id);
        $riwayatabsensi->update($request->all());
        return redirect('admin/riwayatabsensi');
    }
}
