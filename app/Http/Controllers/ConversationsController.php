<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversationsController extends Controller
{
    public function index()
    {
        $Conversations = Convesation::latest() -> get();
        
        return view('conversations.index', ['conversations' => $conversations]);
    }

    public function show(Conversation $conversation)
    {
        return view('conversations.show', ['conversation' => $conversation]);
    }

    public function store()
    {
        $conversation = Conversation::create($this->validateRequest());

        return redirect('/conversations/' . $conversation->id);
    }



}
