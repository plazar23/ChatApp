<?php

namespace App\Http\Controllers\Api;

use App\Models\Conversation;
use Illuminate\Http\Response;
use App\Http\Resources\ConversationResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class ConversationController extends Controller
{
    public function index()
    {
       
       $conversations = Conversation::all();
       
        return response()->json(['conversations' => $conversations], 200);
    }

    
    public function create()
    {
        return view('conversations.create');
    }

    public function show(Conversation $conversation) {
        return response()->json(['conversation' => $conversation], 200);
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
