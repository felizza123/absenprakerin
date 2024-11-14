<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Datajurnal;
use Illuminate\Http\Request;

class DatajurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datajurnal = Datajurnal::orderBy('created_at', 'DESC')->get(); //mengambil data dan mengurutkannya berdasarkan kolom created_at dalam urutan descending (terbaru ke terlama)
        return view('pages.datajurnal.index', compact('datajurnal')); //mengirim data jurnal yang telah dibuat ke dalam tampilan
    } 

    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datajurnal = Datajurnal::find($id); //mengambil data jurnal berdasarkan id
        return view('pages.datajurnal.show', compact('datajurnal')); //mengirim data jurnal yang telah dibuat ke dalam tampilan
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datajurnal = Datajurnal::find($id); // mengambil data jurnal berdasarkan id
        $jurnal = Jurnal::where('namasiswa_id', $datajurnal->namasiswa_id)->delete(); //menghapus jurnal jika dalam data jurnal terhapus
        $datajurnal->delete(); //menghapus data jurnal
        return redirect('admin/datajurnal'); //mengarahkan ke halaman data jurnal
    }
}
