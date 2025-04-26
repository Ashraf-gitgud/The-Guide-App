<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Guide;
use App\Models\Hotel;
use App\Models\Restaurant;
use App\Models\Reviews;

class AdminController extends Controller
{
    public function pendingAccounts()
    {
        return response()->json([
            'guides' => Guide::where('status', 'pending')->get(),
            'drivers' => Driver::where('status', 'pending')->get(),
            'hotels' => Hotel::where('status', 'pending')->get(),
            'restaurants' => Restaurant::where('status', 'pending')->get(),
        ]);
    }

    public function approveAccount(Request $request)
    {
        $type = $request->type;
        $id = $request->id;

        $model = $this->resolveModel($type);
        $record = $model::findOrFail($id);
        $record->status = 'active';
        $record->save();

        return response()->json(["message" => ucfirst($type) . " approved successfully"]);
    }

    public function removeAccount(Request $request)
    {
        $type = $request->type;
        $id = $request->id;

        $model = $this->resolveModel($type);
        $record = $model::findOrFail($id);
        $record->status = 'removed';
        $record->save();

        return response()->json(["message" => ucfirst($type) . " removed successfully"]);
    }

    private function resolveModel($type)
    {
        return match ($type) {
            'guide' => Guide::class,
            'driver' => Driver::class,
            'hotel' => Hotel::class,
            'restaurant' => Restaurant::class,
            default => abort(400, 'Invalid type')
        };
    }

    public function deleteReviews($id)
    {
        $review = Reviews::find($id);

        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $review->delete();

        return response()->json(['message' => 'Review deleted successfully']);
    }

}
