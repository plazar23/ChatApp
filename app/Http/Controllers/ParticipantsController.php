<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    public function index()
    {
       // $Participants = Participant::latest() -> get();
    //    ['participants' => $participants]
        return view('participants.index' );
    }

    public function show(Participant $participant)
    {
        return view('participants.show', ['participant' => $participant]);
    }

    public function store()
    {
        $participant = Participant::create($this->validateRequest());

        return redirect('/participants/' . $participant->id);
    } 
}
