<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Kelas;
use Illuminate\Support\Facades\Log;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas =  Kelas::get();
        return Inertia::render('frontend/Kelas/Index',['kelas'=> $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('frontend/Kelas/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::debug("terpangil");
        $request->validate([

            'kelas'=> 'required',
        ]);
        Kelas::create([

            'kelas'=> $request->kelas,

        ]);
        return redirect()->to('/kelas')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(kelas $kelas)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kela)
    {
        log::debug($kela);
        return Inertia::render('frontend/Kelas/Edit',['kelas'=> $kela]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kela)
    {
        $kela->delete();
        return redirect()->to('/kelas')->with('success','Data berhasil di hapus');
    }
}
