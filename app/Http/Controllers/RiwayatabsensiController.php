<?php

namespace App\Http\Controllers;

use App\Models\Riwayatabsensi;
use Illuminate\Http\Request;

class RiwayatabsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riwayatabsensi = Riwayatabsensi::orderBy('created_at', 'DESC')->get();
        return view('pages.riwayatabsensi.index', compact('riwayatabsensi'));
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $riwayatabsensi = Riwayatabsensi::find($id);
        return view('pages.riwayatabsensi.show', compact('riwayatabsensi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $riwayatabsensi = Riwayatabsensi::find($id);
        $riwayatabsensi->delete();
        return redirect('admin/riwayatabsensi');
    }
}
