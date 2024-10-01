<?php

namespace App\Http\Controllers;

use App\Models\Datasiswa;
use Illuminate\Http\Request;

class DatasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datasiswa = Datasiswa::all();
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
            'nama' => 'required',

        ]);
        $datasiswa = new Datasiswa();
        $datasiswa->nama = $request->nama;
        $datasiswa->save();

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
            'nama' => 'required',
        ]);
            $datasiswas = Datasiswa::find($id);
            $datasiswas->nama = $request->nama;
            $datasiswas->save();
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
