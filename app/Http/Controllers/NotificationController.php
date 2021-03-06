<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\NotificationResource;

class NotificationController extends Controller
{
    public function index()
    {
        return [
            'read' => auth()->user()->readNotifications(),
            'unread' => auth()->user()->unreadNotifications(),
        ];
    }

    public function markAsRead(Request $request)
    {
        auth()->user()->notifications->where('id', $request->id)->markAsRead();
    }
}
