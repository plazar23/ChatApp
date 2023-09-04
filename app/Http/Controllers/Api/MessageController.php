<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Controllers\Controller;


class MessageController extends Controller
{
 
    public function index()
    {
       // $Messages = Message::latest() -> get();
    //    ['messages' => $messages]
        return view('messages.index' );
    }

    public function show(Message $message)
    {
        return view('messages.show', ['message' => $message]);
    }

    public function store()
    {
        $message = Message::create($this->validateRequest());

        return redirect('/messages/' . $message->id);
    }
}
