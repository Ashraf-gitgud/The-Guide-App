<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attractions;

class AttractionsController extends Controller
{
    public function index()
    {
        return Attractions::all();
    }

    public function show($id)
    {
        return Attractions::findOrFail($id);
    }
}
