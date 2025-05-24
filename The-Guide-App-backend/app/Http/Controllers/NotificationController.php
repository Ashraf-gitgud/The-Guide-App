<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel;
use App\Models\Restaurant;
use App\Models\Guide;
use App\Models\Driver;

class NotificationController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
            $notifiable = $this->getNotifiableEntity($user);
            
            if (!$notifiable) {
                return response()->json([
                    'message' => 'No notifiable entity found for this user',
                    'role' => $user->role
                ], 404);
            }

            $notifications = $notifiable->notifications()->paginate(10);
            
            return response()->json([
                'notifications' => $notifications,
                'unread_count' => $notifiable->unreadNotifications()->count()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving notifications',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function markAsRead($id)
    {
        try {
            $user = Auth::user();
            $notifiable = $this->getNotifiableEntity($user);
            
            if (!$notifiable) {
                return response()->json([
                    'message' => 'No notifiable entity found for this user',
                    'role' => $user->role
                ], 404);
            }

            $notification = $notifiable->notifications()->findOrFail($id);
            $notification->markAsRead();
            
            return response()->json([
                'message' => 'Notification marked as read',
                'notification' => $notification
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error marking notification as read',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function markAllAsRead()
    {
        try {
            $user = Auth::user();
            $notifiable = $this->getNotifiableEntity($user);
            
            if (!$notifiable) {
                return response()->json([
                    'message' => 'No notifiable entity found for this user',
                    'role' => $user->role
                ], 404);
            }

            $notifiable->unreadNotifications->markAsRead();
            
            return response()->json([
                'message' => 'All notifications marked as read',
                'unread_count' => 0
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error marking notifications as read',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    protected function getNotifiableEntity($user)
    {
        switch ($user->role) {
            case 'hotel':
                return $user->hotel;
            case 'restaurant':
                return $user->restaurant;
            case 'guide':
                return $user->guide;
            case 'driver':
                return $user->driver;
            default:
                return null;
        }
    }
} 