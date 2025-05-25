<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    public function index()
    {
        return Driver::all();
    }

    public function show($id)
    {
        return Driver::findOrFail($id);
    }
}
