<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    public function index()
    {
        $sessionId = Session::getId();
        $chats = Chat::where('session_id', $sessionId)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($chats);
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $chat = Chat::create([
            'session_id' => Session::getId(),
            'message' => $request->message,
            'is_admin' => false,
            'is_read' => false,
        ]);

        return response()->json($chat);
    }
}
