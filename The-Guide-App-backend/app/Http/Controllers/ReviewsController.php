<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Log;

class ReviewsController extends Controller
{
    public function index()
    {
        try {
            $reviews = Reviews::with('user')->get();
            
            if ($reviews->isEmpty()) {
                return response()->json([
                    'message' => 'No reviews found',
                    'debug_info' => [
                        'count' => 0,
                        'ids' => []
                    ]
                ], 404);
            }

            return response()->json([
                'reviews' => $reviews,
                'debug_info' => [
                    'count' => $reviews->count(),
                    'ids' => $reviews->pluck('id')
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Error retrieving reviews:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'message' => 'Error retrieving reviews',
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'tourist_id' => 'required|exists:tourists,tourist_id',
                'user_id' => 'required|exists:users,user_id',
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'nullable|string'
            ]);

            $review = Reviews::create($data);
            return response()->json([
                'message' => 'Review created successfully',
                'review' => $review->load(['user', 'tourist'])
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error:', [
                'errors' => $e->errors(),
                'data' => $request->all()
            ]);
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error creating review:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data' => $data ?? null
            ]);
            return response()->json([
                'message' => 'Error creating review',
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function show($id)
    {
        try {
            $review = Reviews::with('user')->find($id);
            
            if (!$review) {
                return response()->json([
                    'message' => 'Review not found',
                    'id' => $id,
                    'debug_info' => [
                        'id_type' => gettype($id),
                        'id_value' => $id,
                        'available_ids' => Reviews::pluck('id')->toArray()
                    ]
                ], 404);
            }

            return response()->json([
                'review' => $review,
                'debug_info' => [
                    'id' => $id,
                    'user_id' => $review->user_id
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Error finding review:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'id' => $id
            ]);
            return response()->json([
                'message' => 'Error finding review',
                'error' => $e->getMessage(),
                'id' => $id
            ], 403);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $review = Reviews::find($id);
            
            if (!$review) {
                return response()->json([
                    'message' => 'Review not found',
                    'id' => $id,
                    'debug_info' => [
                        'id_type' => gettype($id),
                        'id_value' => $id,
                        'available_ids' => Reviews::pluck('id')->toArray()
                    ]
                ], 404);
            }

            $data = $request->validate([
                'rating' => 'sometimes|required|integer|min:1|max:5',
                'comment' => 'nullable|string'
            ]);

            // Prevent updating user_id
            unset($data['user_id']);

            $review->fill($data);
            $review->save();

            return response()->json([
                'message' => 'Review updated successfully',
                'review' => $review->fresh('user')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error:', [
                'errors' => $e->errors(),
                'data' => $request->all()
            ]);
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error updating review:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'id' => $id
            ]);
            return response()->json([
                'message' => 'Error updating review',
                'error' => $e->getMessage(),
                'id' => $id
            ], 403);
        }
    }

    public function destroy($id)
    {
        try {
            $review = Reviews::find($id);
            
            if (!$review) {
                return response()->json([
                    'message' => 'Review not found',
                    'id' => $id,
                    'debug_info' => [
                        'id_type' => gettype($id),
                        'id_value' => $id,
                        'available_ids' => Reviews::pluck('id')->toArray()
                    ]
                ], 404);
            }

            $review->delete();
            return response()->json([
                'message' => 'Review deleted successfully',
                'id' => $id
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting review:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'id' => $id
            ]);
            return response()->json([
                'message' => 'Error deleting review',
                'error' => $e->getMessage(),
                'id' => $id
            ], 403);
        }
    }

    public function getReviewsByUser($userId)
    {
        try {
            $reviews = Reviews::where('user_id', $userId)
                            ->with(['user', 'tourist'])
                            ->get();
            
            if ($reviews->isEmpty()) {
                return response()->json([
                    'message' => 'No reviews found for this user',
                    'user_id' => $userId
                ], 404);
            }

            return response()->json([
                'reviews' => $reviews,
                'count' => $reviews->count()
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error retrieving user reviews:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => $userId
            ]);
            return response()->json([
                'message' => 'Error retrieving user reviews',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
