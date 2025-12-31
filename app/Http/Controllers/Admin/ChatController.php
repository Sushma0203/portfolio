<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $sessions = Chat::select('session_id')
            ->selectRaw('MAX(created_at) as last_message_at')
            ->selectRaw('COUNT(CASE WHEN is_read = false AND is_admin = false THEN 1 END) as unread_count')
            ->groupBy('session_id')
            ->orderBy('last_message_at', 'desc')
            ->get();

        return view('admin.chats.index', compact('sessions'));
    }

    public function show($sessionId)
    {
        $chats = Chat::where('session_id', $sessionId)
            ->orderBy('created_at', 'asc')
            ->get();

        // Mark as read
        Chat::where('session_id', $sessionId)
            ->where('is_admin', false)
            ->update(['is_read' => true]);

        return view('admin.chats.show', compact('chats', 'sessionId'));
    }

    public function reply(Request $request, $sessionId)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        Chat::create([
            'session_id' => $sessionId,
            'message' => $request->message,
            'is_admin' => true,
            'is_read' => true,
        ]);

        return redirect()->back()->with('success', 'Reply sent successfully.');
    }
}
