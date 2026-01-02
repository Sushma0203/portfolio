<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatBotQuestion;
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

        $messageText = $request->message;
        $sessionId = Session::getId();

        // 1. Save user message
        $chat = Chat::create([
            'session_id' => $sessionId,
            'message' => $messageText,
            'is_admin' => false,
            'is_read' => false,
        ]);

        // 2. Check for auto-response
        $botQuestions = ChatBotQuestion::all();
        foreach ($botQuestions as $bq) {
            // Simple case-insensitive match
            if (stripos($messageText, $bq->question) !== false) {
                Chat::create([
                    'session_id' => $sessionId,
                    'message' => $bq->answer,
                    'is_admin' => true,
                    'is_read' => true,
                ]);
                // We could break here if we only want one response, or continue for multiple matches.
                // Breaking for now to avoid multiple bots responding to one message.
                break;
            }
        }

        return response()->json($chat);
    }
}
