<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatBotQuestion;
use Illuminate\Http\Request;

class ChatBotController extends Controller
{
    public function index()
    {
        $questions = ChatBotQuestion::latest()->get();
        return view('admin.chatbot.index', compact('questions'));
    }

    public function create()
    {
        return view('admin.chatbot.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        ChatBotQuestion::create($request->all());

        return redirect()->route('admin.chatbot.index')->with('success', 'Question added successfully.');
    }

    public function edit($id)
    {
        $question = ChatBotQuestion::findOrFail($id);
        return view('admin.chatbot.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $question = ChatBotQuestion::findOrFail($id);
        $question->update($request->all());

        return redirect()->route('admin.chatbot.index')->with('success', 'Question updated successfully.');
    }

    public function destroy($id)
    {
        $question = ChatBotQuestion::findOrFail($id);
        $question->delete();

        return redirect()->route('admin.chatbot.index')->with('success', 'Question deleted successfully.');
    }
}
