<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        return Restaurant::all();
    }

    public function show($id)
    {
        return Restaurant::findOrFail($id);
    }
}
