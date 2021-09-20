<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create($id = null)
    {
        if ($id) {
            $user = User::find($id);
            return view('dashboard.messages.create', compact('user'));
        } else {
            $users = User::where('id', '<>', auth()->user()->id)->get();
            return view('dashboard.messages.create', compact('users'));
        }
    }

    public function inbox()
    {
        return view('dashboard.messages.inbox');
    }

    public function outbox()
    {
        return view('dashboard.messages.outbox');
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
        ]+$request->all());

        $request->session()->flash('flash.banner', 'Mensaje enviado');

        return redirect()->back();
    }

    public function show($id)
    {
        $message = Message::find($id);
        return view('dashboard.messages.show', compact('message'));
    }
}
