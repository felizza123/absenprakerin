<?php

namespace App\Http\Controllers;

use App\Models\Datasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DatasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datasiswa = Datasiswa::orderBy('created_at', 'DESC')->get();
        return view('pages.datasiswa.index', compact('datasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.datasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:datasiswa,nis|max:8',
            'nama' => 'required',
            'jurusan' => 'required',
            'mulaiprakerin' => 'required',
            'akhirprakerin' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'nis.required' => 'NIS sudah terdaftar, silahkan daftarkan NIS yang lain',
            'nama.required' => 'Nama harus diisi',
            'jurusan.required' => 'Jurusan harus diisi',
            'mulaiprakerin.required' => 'Tanggal Mulaiprakerin harus diisi',
            'akhirprakerin.required' => 'Tanggal Akhirprakerin harus diisi',
            'foto.required' => 'Foto harus diisi',
        ]);

       $imageName = time() . '.' . $request->foto->extension(); //rename file
        $request->foto->storeAs('image', $imageName, 'public');

        $datasiswas = Datasiswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'mulaiprakerin' => $request->mulaiprakerin,
            'akhirprakerin' => $request->akhirprakerin,
            'foto' => $imageName,
        ]);

        return redirect('admin/datasiswa');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datasiswa = Datasiswa::find($id);
        return view('pages.datasiswa.show', compact('datasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datasiswa = Datasiswa::find($id);
        return view('pages.datasiswa.edit', compact('datasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nis' => 'required|unique:datasiswa,nis|max:8',
            'nama' => 'required',
            'jurusan' => 'required',
            'mulaiprakerin' => 'required',
            'akhirprakerin' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $datasiswa = Datasiswa::find($id);
        if ($request->has('foto')){
            $imageName = time() . '.' . $request->foto->extension(); //rename file
            $request->foto->storeAs('image', $imageName, 'public');
        }else{
            $imageName = $datasiswa->foto;
        }

            $datasiswa->nis = $request->nis;
            $datasiswa->nama = $request->nama;
            $datasiswa->jurusan = $request->jurusan;
            $datasiswa->mulaiprakerin = $request->mulaiprakerin;
            $datasiswa->akhirprakerin = $request->akhirprakerin;
            $datasiswa->foto = $imageName;
            $datasiswa->save();
      
        return redirect('admin/datasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datasiswas = Datasiswa::find($id);
        $datasiswas->delete();
        return redirect('admin/datasiswa');
    }
}
