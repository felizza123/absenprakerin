<?php

namespace App\Http\Controllers;

use App\Models\Datajurnal;
use App\Models\Datasiswa;
use App\Models\Jurnal;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurnal = Jurnal::with('datasiswa')
        ->orderBy('updated_at', 'DESC')
        ->get();

        return view('pages.jurnal.index', compact('jurnal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datasiswa = Datasiswa::all();
        return view('pages.jurnal.create', compact('datasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'nis' => 'required',
            'namasiswa_id' => 'required',
            'haritanggal' => 'required',
            'jurusan' => 'required',
            'waktumulai' => 'required',
            'waktuselesai' => 'required',
            'jurnal' => 'required',
        ],[
            'nis.required' => 'NIS harus diisi',
            'namasiswa_id.required' => 'Nama harus diisi',
            'haritanggal.required' => 'Haritanggal harus diisi',
            'jurusan.required' => 'Jurusan harus diisi',
            'waktumulai' => 'Waktumulai harus diisi',
            'waktuselesai' => 'Waktuselesai harus diisi',
            'jurnal.required' => 'Jurnal harus diisi',
        ]);

        Datajurnal::create($request->only(['nis', 'namasiswa_id', 'haritanggal', 'jurusan' ,'waktumulai', 'waktuselesai', 'jurnal']));
        Jurnal::create($request->only(['nis', 'namasiswa_id', 'haritanggal', 'jurusan' ,'waktumulai', 'waktuselesai', 'jurnal']));
        return redirect()->route('admin.jurnal.index')->with('success', 'Kamu telah absen.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jurnal = Jurnal::find($id);
        return view('pages.jurnal.show', compact('jurnal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jurnal = Jurnal::find($id);
        $datasiswa = Datasiswa::all();
        return view('pages.jurnal.edit', compact('jurnal','datasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nis' => 'required',
            'namasiswa_id' => 'required',
            'haritanggal' => 'required',
            'jurusan' => 'required',
            'waktumulai' => 'required',
            'waktuselesai' => 'required',
            'jurnal' => 'required',
        ],[
            'nis.required' => 'NIS harus diisi',
            'namasiswa_id.required' => 'Nama harus diisi',
            'haritanggal.required' => 'Haritanggal harus diisi',
            'jurusan.required' => 'Jurusan harus diisi',
            'waktumulai' => 'Waktumulai harus diisi',
            'waktuselesai' => 'Waktuselesai harus diisi',
            'jurnal.required' => 'Jurnal harus diisi',
        ]);
        $jurnal = Jurnal::find($id);
        $jurnal->update($request->all());
        return redirect('admin/jurnal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurnal = Jurnal::find($id);
        $jurnal->delete();
        return redirect('admin/jurnal');
    }
}
