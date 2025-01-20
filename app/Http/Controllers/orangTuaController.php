<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
Use App\Models\OrangTua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class orangTuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orangTua =  OrangTua::get();
       return Inertia::render('frontend/OrangTua/Index',['orangTua'=> $orangTua]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return Inertia::render('frontend/OrangTua/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name'=> 'required',
        ]);
        OrangTua::create([

            'name'=> $request->name,

        ]);
        return redirect()->to('/orangTua')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(OrangTua $orangTua)
    {
        // log::debug($orangTua);
        return Inertia::render('frontend/OrangTua/Edit',['orangTua'=> $orangTua]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrangTua $orangTua)
    {
        log::debug('Data yang diterima untuk update:', $request->all());

        $request->validate([
            'orangTua' => 'required',
        ]);

        $orangTua->update([
            'name' => $request->orangTua,
        ]);

        return redirect()->to('/orangTua')->with('success', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrangTua $orangTua)
    {
        $orangTua->delete();
        return redirect()->to('/orangTua')->with('success','Data berhasil di hapus');
    }
}
