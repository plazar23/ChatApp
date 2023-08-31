<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;

class ConversationController extends Controller
{
    public function index()
    {
       
       $conversations = Conversation::latest() -> get();
       
        return view('conversations.index', [
            'conversations' => $conversations
        ]);
    }

    
    public function create()
    {
        return view('conversations.create');
    }

    public function show($id) {
        $conversation = Conversation::findOrFail($id);
        return view('conversations.show', ['conversation' => $conversation]);
      }


}
