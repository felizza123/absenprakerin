<?php

namespace App\Http\Controllers;

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
           'status' => 'required',
        ],[
            'nis.required' => 'NIS harus diisi',
            'namasiswa_id.required' => 'Nama harus diisi',
            'jurusan.required' => 'Jurusan harus diisi',
            'haritanggal.required' => 'Haritanggal harus diisi',
            'status.required' => 'Status harus diisi',
        ]);

        Absensi::create($request->only(['nis', 'namasiswa_id', 'jurusan', 'haritanggal', 'status']));
        return redirect()->route('form.index')->with('success', 'Data kamu sudah disimpan.');
    }
}
