<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view("admin.messages.index", [
            'messages' => Message::select(['id', 'email', 'name', 'created_at', 'read'])->get(),
        ]);
    }

    public function show(Message $message)
    {
        return view('admin.messages.show', ['message' => $message]);
    }

    public function read(Message $message, Request $request)
    {
        $message->update(['read' => (bool) $request->read]);
        return back()->with('success', $request->read ? 'Message marqué comme lu' : 'Message marqué comme non lu');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return back()->with('success', 'Message supprimé !');
    }
}
