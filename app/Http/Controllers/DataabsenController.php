<?php

namespace App\Http\Controllers;

use App\Models\Dataabsen;
use App\Models\Riwayatabsensi;
use Illuminate\Http\Request;

class DataabsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataabsen = Dataabsen::orderBy('created_at', 'DESC')->get(); //mengambil data dan mengurutkannya berdasarkan kolom created_at dalam urutan descending (terbaru ke terlama)
        return view('pages.dataabsen.index', compact('dataabsen')); //mengirim data absen yang telah dibuat ke dalam tampilan
    }

   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataabsen = Dataabsen::find($id); //mengambil data absen berdasarkan id
        return view('pages.dataabsen.show', compact('dataabsen')); //mengirim data absen yang telah dibuat ke dalam tampilan
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataabsen = Dataabsen::find($id); //mengambil data absen berdasarkan id
        $riwayatabsensis = Riwayatabsensi::where('namasiswa_id', $dataabsen->namasiswa_id)->delete(); //menghapus riwayat absen jika dalam data absen terhapus
        $dataabsen->delete(); //menghapus data absen
        return redirect('admin/dataabsen'); //mengarahkan ke halaman data absen
    }

}
