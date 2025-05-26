<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Driver, Hotel, Restaurant, Guide, Reviews};
use Illuminate\Container\Attributes\DB;

class AdminDashboard extends Controller
{
    public function dashboardStats()
    {
        return response()->json([
            'system_overview' => $this->getSystemOverview(),
            'approval_stats' => $this->getApprovalStats(),
            'recent_activity' => $this->getRecentActivity(),
            'review_analytics' => $this->getReviewAnalytics()
        ]);
    }

    protected function getSystemOverview()
    {
        return [
            'total_users' => User::count(),
            'active_users' => $this->countActiveUsers(),
            'new_users_today' => User::whereDate('created_at', today())->count()
        ];
    }

    protected function countActiveUsers()
    {
        return User::whereHas('guide', fn($q) => $q->where('status', 'active'))
            ->orWhereHas('driver', fn($q) => $q->where('status', 'active'))
            ->orWhereHas('hotel', fn($q) => $q->where('status', 'active'))
            ->orWhereHas('restaurant', fn($q) => $q->where('status', 'active'))
            ->count();
    }

    protected function getApprovalStats()
    {
        return [
            'pending_guides' => Guide::where('status', 'pending')->count(),
            'pending_drivers' => Driver::where('status', 'pending')->count(),
            'pending_hotels' => Hotel::where('status', 'pending')->count(),
            'pending_restaurants' => Restaurant::where('status', 'pending')->count(),
            'recently_approved' => $this->getRecentlyApproved()
        ];
    }

    protected function getRecentlyApproved()
    {
        return DB::table('approval_logs')
            ->where('action', 'approved')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    }

    protected function getRecentActivity()
    {
        return Reviews::with(['user', 'reviewable'])
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($review) {
                return [
                    'id' => $review->id,
                    'user' => $review->user->name,
                    'type' => class_basename($review->reviewable),
                    'rating' => $review->rating,
                    'created_at' => $review->created_at->diffForHumans()
                ];
            });
    }

    protected function getReviewAnalytics()
    {
        return [
            'total_reviews' => Reviews::count(),
            'average_rating' => round(Reviews::avg('rating'), 2),
            'flagged_reviews' => Reviews::where('is_flagged', true)->count(),
            'reviews_today' => Reviews::whereDate('created_at', today())->count()
        ];
    }

    public function approvalQueue()
    {
        return app(AdminController::class)->pendingAccounts();
    }

    public function approve(Request $request)
    {
        $response = app(AdminController::class)->approveAccount($request);

        // Log approval
        DB::table('approval_logs')->insert([
            'admin_id' => auth()->id(),
            'action' => 'approved',
            'type' => $request->type,
            'target_id' => $request->id,
            'created_at' => now()
        ]);

        return $response;
    }

    public function remove(Request $request)
    {
        $response = app(AdminController::class)->removeAccount($request);

        // Log removal
        DB::table('approval_logs')->insert([
            'admin_id' => auth()->id(),
            'action' => 'removed',
            'type' => $request->type,
            'target_id' => $request->id,
            'created_at' => now()
        ]);

        return $response;
    }
}
