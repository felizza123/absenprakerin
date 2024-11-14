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
        $datasiswa = Datasiswa::orderBy('updated_at', 'DESC')->get(); //mengambil data dan mengurutkannya berdasarkan kolom created_at dalam urutan descending (terbaru ke terlama)
        return view('pages.datasiswa.index', compact('datasiswa')); //mengirim data absen yang telah dibuat ke dalam tampilan
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.datasiswa.create'); //mengirim data siswa yang telah dibuat ke dalam tampilan
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
        $request->foto->storeAs('image', $imageName, 'public'); //simpan file

        $datasiswas = Datasiswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'mulaiprakerin' => $request->mulaiprakerin,
            'akhirprakerin' => $request->akhirprakerin,
            'foto' => $imageName,
        ]); 

        return redirect('admin/datasiswa'); //redirect ke halaman absen
    
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
        'nis' => 'required|max:8|unique:datasiswa,nis,' . $id,
        'nama' => 'required',
        'jurusan' => 'required',
        'mulaiprakerin' => 'required',
        'akhirprakerin' => 'required',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $datasiswa = Datasiswa::find($id);

    if ($request->hasFile('foto')) {
        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->storeAs('image', $imageName, 'public');
        $datasiswa->foto = $imageName; // Perbarui foto jika ada yang baru
    }

    $datasiswa->nis = $request->nis;
    $datasiswa->nama = $request->nama;
    $datasiswa->jurusan = $request->jurusan;
    $datasiswa->mulaiprakerin = $request->mulaiprakerin;
    $datasiswa->akhirprakerin = $request->akhirprakerin;
    $datasiswa->save();

    return redirect()->route('admin.datasiswa.index');
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
