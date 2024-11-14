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
        ->get(); //mengambil data dan mengurutkannya berdasarkan kolom created_at dalam urutan descending (terbaru ke terlama)

        return view('pages.jurnal.index', compact('jurnal')); //mengirim jurnal yang telah dibuat ke dalam tampilan
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datasiswa = Datasiswa::all(); // Mengambil semua data siswa
        return view('pages.jurnal.create', compact('datasiswa')); // Mengirim jurnal yang telah dibuat ke dalam tampilan
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
            'waktumulai' => 'Waktu Mulai harus diisi',
            'waktuselesai' => 'Waktu Selesai harus diisi',
            'jurnal.required' => 'Jurnal harus diisi',
        ]);

        Datajurnal::create($request->only(['nis', 'namasiswa_id', 'haritanggal', 'jurusan' ,'waktumulai', 'waktuselesai', 'jurnal'])); // Membuat data jurnal
        Jurnal::create($request->only(['nis', 'namasiswa_id', 'haritanggal', 'jurusan' ,'waktumulai', 'waktuselesai', 'jurnal'])); // Membuat jurnal
        return redirect()->route('admin.jurnal.index'); // Mengarahkan ke halaman jurnal
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jurnal = Jurnal::find($id); //mengambil jurnal berdasarkan id
        return view('pages.jurnal.show', compact('jurnal')); //mengirim jurnal yang telah dibuat ke dalam tampilan
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jurnal = Jurnal::find($id); //mengambil jurnal berdasarkan id
        $datasiswa = Datasiswa::all(); // Mengambil semua data siswa
        return view('pages.jurnal.edit', compact('jurnal','datasiswa')); // Mengirim jurnal yang telah dibuat ke dalam tampilan
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
            'waktumulai' => 'Waktu Mulai harus diisi',
            'waktuselesai' => 'Waktu Selesai harus diisi',
            'jurnal.required' => 'Jurnal harus diisi',
        ]);
        $jurnal = Jurnal::find($id); //mengambil jurnal berdasarkan id
        $jurnal->update($request->all()); // Perbarui jurnal

        $datajurnal = Datajurnal::where('nis', $request->nis)
        ->where('haritanggal', $request->haritanggal)
        ->first(); //mengambil jurnal berdasarkan nis dan haritanggal
        if ($datajurnal) {
            $datajurnal->update([
                'nis' => $request->nis,
                'namasiswa_id' => $request->namasiswa_id,
                'jurusan' => $request->jurusan,
                'haritanggal' => $request->haritanggal,
                'waktumulai' => $request->waktumulai,
                'waktuselesai' => $request->waktuselesai,
                'jurnal' => $request->jurnal
            ]); // Perbarui data jurnal
        }
        return redirect('admin/jurnal'); // Mengarahkan ke halaman jurnal
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurnal = Jurnal::find($id); //mengambil jurnal berdasarkan id
        $jurnal->delete(); //menghapus jurnal
        return redirect('admin/jurnal'); //mengarahkan ke halaman jurnal
    }
}
