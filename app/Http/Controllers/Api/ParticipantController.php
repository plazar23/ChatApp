<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Http\Controllers\Controller;

class ParticipantController extends Controller

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

    public function destroy(Participant $participant)
    {
        $participant->delete();

        return redirect('/participants');
    }

    public function create()
    {
        return view('participants.create');
    }
}
