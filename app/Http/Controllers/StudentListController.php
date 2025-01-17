<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Kelas;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


class StudentListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::with(['siswas'])->get();

        $processedData = [];
        foreach ($kelas as $kls) {
            $maxRows = $kls->siswas->count();
            for ($i = 0; $i < $maxRows; $i++) {
                $processedData[] = [
                    'id' => $i === 0 ? $kls->id : null,
                    'kelas' => $i === 0 ? $kls->kelas : null,
                    'siswa' => $kls->siswas[$i]->name ?? null,
                ];
            }

            if ($maxRows === 0) {
                $processedData[] = [
                    'id' => $kls->id,
                    'kelas' => $kls->kelas,
                    'siswa' => null,
                ];
            }
        }

        return Inertia::render('frontend/ListSiswa/index', [
            'kelas' => $processedData,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
