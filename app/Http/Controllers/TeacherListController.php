<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Kelas;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class TeacherListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::with(['gurus'])->get();

        $processedData = [];
        foreach ($kelas as $kls) {
            $maxRows = $kls->gurus->count();
            for ($i = 0; $i < $maxRows; $i++) {
                $processedData[] = [
                    'id' => $i === 0 ? $kls->id : null,
                    'kelas' => $i === 0 ? $kls->kelas : null,
                    'guru' => $kls->gurus[$i]->guru ?? null,
                ];
            }

            if ($maxRows === 0) {
                $processedData[] = [
                    'id' => $kls->id,
                    'kelas' => $kls->kelas,
                    'guru' => null,
                ];
            }
        }

        return Inertia::render('frontend/ListGuru/index', [
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
