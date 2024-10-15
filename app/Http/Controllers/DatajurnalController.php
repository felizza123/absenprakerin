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
        $datajurnal = Datajurnal::orderBy('created_at', 'DESC')->get();
        return view('pages.datajurnal.index', compact('datajurnal'));
    }

    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datajurnal = Datajurnal::find($id);
        return view('pages.datajurnal.show', compact('datajurnal'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datajurnal = Datajurnal::find($id);
        $jurnal = Jurnal::where('namasiswa_id', $datajurnal->namasiswa_id)->delete();
        $datajurnal->delete();
        return redirect('admin/datajurnal');
    }
}
