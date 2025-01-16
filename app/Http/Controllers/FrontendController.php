<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontendController extends Controller
{
    public function index()
    {
        return Inertia::render('frontend/Home');
    }
    public function students(){
        return Inertia::render('frontend/Siswa',
    ['title' => 'Siswa']);
    }
}
