<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tourist;

class TouristController extends Controller
{
    public function index()
    {
        return Tourist::all();
    }

    public function show($id)
    {
        return Tourist::findOrFail($id);
    }
    public function getByUserId($user_id)
    {
        return Tourist::where('user_id', $user_id)->firstOrFail();
    }

}
