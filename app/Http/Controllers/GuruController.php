<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Guru;
use Illuminate\Support\Facades\Log;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $gurus = Guru::when($request->search, function ($query, $search) {
            $query->where('kelas', 'like', '%' . $search . '%');
        })->paginate(5);

        return Inertia::render('frontend/Guru/Index', ['gurus' => $gurus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('frontend/Guru/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::debug("terpangil");
        $request->validate([
            'guru' => 'required',
            'kelas'=> 'required',
        ]);
        Guru::create([
            'guru'=> $request->guru,
            'kelas'=> $request->kelas,

        ]);
        return redirect()->to('/guru')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        log::debug($guru);
        return Inertia::render('frontend/Guru/Edit',['guru'=> $guru]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        Log::debug("terpangil");
        log::debug($guru);
        $request->validate([
            'guru' => 'required',
            'kelas'=> 'required',
        ]);
        $guru->update([
            'guru'=> $request->guru,
            'kelas'=> $request->kelas,
        ]);
        return redirect()->to('/Guru')->with('success', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->to('/guru')->with('success','Data berhasil di hapus');
    }
}
