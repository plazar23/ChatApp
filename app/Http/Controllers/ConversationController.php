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

    public function store(){
        $conversation = new Conversation();
        $conversation->title = request('title');
        $conversation->save();
        return redirect('/conversations')->with('mssg', 'You created conversation');
    }

    public function destroy($id){
        $conversation = Conversation::findOrFail($id);
        $conversation->delete();
        return redirect('/conversations');
    }

}
