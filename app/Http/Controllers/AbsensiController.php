<?php

namespace App\Http\Controllers;

use App\Models\Datasiswa;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi = Absensi::orderBy('created_at', 'DESC')->get();
        return view('pages.absensi.index', compact('absensi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datasiswa = Datasiswa::all();
        return view('pages.absensi.create', compact('datasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:absensi,nis|max:8',
            'nama' => 'required|max:255',
            'jurusan' => 'required',
            'status' => 'required',

        ],[
            'nis.required' => 'NIS harus diisi',
            'nis.unique' => 'NIS sudah terdaftar, silahkan daftarkan NIS yang lain',
            'nama.required' => 'Nama harus diisi',
            'jurusan.required' => 'Jurusan harus diisi',
            'status.required' => 'status harus diisi',
        ]);
        $absensi = Absensi::create($request->all());
        return redirect()->route('absensi.index', 'dataabsen.index')->with('success', 'Kamu telah absen.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $absensi = Absensi::find($id);
        return view('pages.absensi.show', compact('absensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datasiswa = Datasiswa::all();
        $absensi = Absensi::find($id);
        return view('pages.absensi.edit', compact('absensi', 'datasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nis' => 'required|max:8',
            'namasiswa' => 'required|max:255',
            'jurusan' => 'required',
            'status' => 'required',
            'keterangan' => 'required',
        ]);
        $absensi = Absensi::find($id);
        $absensi->nis = $request->nis;
        $absensi->namasiswa = $request->namasiswa;
        $absensi->jurusan = $request->jurusan;
        $absensi->status = $request->status;
        $absensi->keterangan = $request->keterangan;
        $absensi->save();
        return redirect()->route('absensi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $absensi = Absensi::find($id);
        $absensi->delete();
        return redirect()->route('absensi.index');
    }
}
