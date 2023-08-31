@extends('layouts.layout')

@section('content')

        Helo there this is the conversations page
        @foreach ($conversations as $conversation)
        <div>
                <h1>{{ $conversation->title }}</h1>
               
        </div>
        @endforeach
        
@endsection