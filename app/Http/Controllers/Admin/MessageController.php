<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        
        // Query to fetch messages based on search query
        $messages = Message::where('email', 'LIKE', "%$query%")
                            ->orWhere('message', 'LIKE', "%$query%")
                            ->latest()
                            ->simplePaginate(10);

        return view('admin.messages.index', compact('messages'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function create()
    {
        return view('admin.messages.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'message' => 'required',
        ]);
        $input = $request->all();
        Message::create($input);
        return redirect()->route('admin.messages.index')
            ->with('success', 'Message  created successfully.');
    }
    public function edit(Message $message)
    {
        return view('admin.messages.edit', compact('message'));
    }
    public function update(Request $request, Message $message)
    {
        $request->validate([
            'email' => 'required',
            'message' => 'required',
        ]);
        $input = $request->all();

        $message->update($input);
        return redirect()->route('admin.messages.index')
            ->with('success', 'Farm updated successfully.');
    }
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')
            ->with('success', 'Message deleted successfully.');
    }
}
