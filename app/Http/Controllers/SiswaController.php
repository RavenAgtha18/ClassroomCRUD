<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\OrangTua;
use Illuminate\Support\Facades\Log;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $students = Siswa::with('orangTua')
            ->when($request->search, function ($query, $search) {
                $query->where('kelas', 'like', '%' . $search . '%');
            })
            ->paginate(5);

        return Inertia::render('frontend/Siswa/index', [
            'students' => $students,
            'search' => $request->search,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $kelas = Kelas::all();
        $orangTua = OrangTua::all();


        return Inertia::render('frontend/Siswa/Create', [
            'kelas' => $kelas,
            'orangTua' => $orangTua,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::debug($request->all());
        $request->validate([
            'name' => 'required',
            'kelas'=> 'required',
            'orangTua'=> 'required',
        ]);
        Siswa::create([
            'name'=> $request->name,
            'kelas'=> $request->kelas,
            'orang_tua_id' => $request->orangTua,

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

        $kelas = Kelas::all();
        $orangTua = OrangTua::all();
        return Inertia::render('frontend/Siswa/Edit',['siswa'=> $siswa, 'kelas'=> $kelas, 'orangTua'=> $orangTua]);
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
            'orangTua'=> 'required',
        ]);
        $siswa->update([
            'name'=> $request->name,
            'kelas'=> $request->kelas,
            'orang_tua_id' => $request->orangTua,
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
