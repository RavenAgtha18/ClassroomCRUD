<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Siswa;
use Illuminate\Support\Facades\Log;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students =  Siswa::paginate(5);
        return Inertia::render('frontend/Siswa/index',['students'=> $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('frontend/Siswa/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::debug("terpangil");
        $request->validate([
            'name' => 'required',
            'kelas'=> 'required',
        ]);
        Siswa::create([
            'name'=> $request->name,
            'kelas'=> $request->kelas,

        ]);
        return redirect()->to('/siswa')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        return Inertia::render('frontend/Siswa/Show',['siswa'=> $siswa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return Inertia::render('frontend/Siswa/Edit',['siswa'=> $siswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        Log::debug("terpangil");
        $request->validate([
            'name' => 'required',
            'kelas'=> 'required',
        ]);
        $siswa->update([
            'name'=> $request->name,
            'kelas'=> $request->kelas,
        ]);
        return redirect()->to('/siswa')->with('success', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->to('/siswa')->with('success','Data berhasil di hapus');
    }
}
