<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create($id)
    {
        $user = User::find($id);
        return view('dashboard.messages.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'subject' => 'required',
            'to_user_id' => 'required',
        ]);

        Message::create([
            'from_user_id' => auth()->user()->id,
            'to_user_id' => $request->to_user_id,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        $request->session()->flash('flash.banner', 'Mensaje enviado');

        return redirect()->back();
    }

    public function show(Message $message)
    {
        return view('dashboard.messages.show', compact('message'));
    }
}
