<?php

namespace App\Http\Controllers;

use App\Models\Dataabsen;
use Illuminate\Http\Request;

class DataabsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataabsen = Dataabsen::orderBy('created_at', 'DESC')->get();
        return view('pages.dataabsen.index', compact('dataabsen'));
    }

   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataabsen = Dataabsen::find($id);
        return view('pages.dataabsen.show', compact('dataabsen'));
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataabsen = Dataabsen::find($id);
        $dataabsen->delete();
        return redirect('admin/dataabsen');
    }
}
