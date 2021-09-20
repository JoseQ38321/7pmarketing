<?php

namespace App\Http\Livewire\Dashboard\Messages;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;

class Inbox extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $messages = Message::where('to_user_id', auth()->user()->id)
                            ->where(function ($query) {
                                return $query
                                        ->where('subject', 'LIKE', '%' . $this->search . '%')
                                        ->orWhere('message', 'LIKE', '%' . $this->search . '%');
                            })
                            ->orwhere('to_user_id', auth()->user()->id)
                            ->whereHas('fromUser', function ($query) {
                                return $query
                                        ->where('name', 'LIKE', '%' . $this->search . '%')
                                        ->orWhere('email', 'LIKE', '%' . $this->search . '%');
                            })
                            ->orderBy('created_at', 'desc')
                            ->paginate();
        return view('livewire.dashboard.messages.inbox', compact('messages'));
    }
}
