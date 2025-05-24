<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    { 
        return Reviews::with('user')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'reviewable_type' => 'required|string',
            'reviewable_id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        $review = Reviews::create($data);
        return response()->json($review, 201);
    }

    public function show($id)
    {
        return Reviews::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $review = Reviews::findOrFail($id);
        $data = $request->validate([
            'rating' => 'sometimes|required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        $review->update($data);
        return response()->json($review);
    }

    public function destroy($id)
    {
        Reviews::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
