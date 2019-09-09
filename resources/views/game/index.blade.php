@extends('layouts.app')
@section('content')
@include('includes.result_messages')
<form id="beginGame" method="post" action="{{route('games.store')}}">
    @csrf
    @component('components.inputComponent',['idElement' => 'player1','description' =>'Player 1:','namePlayer' =>'namePlayer1'])
    @endcomponent
    @component('components.inputComponent',['idElement' => 'player2','description' =>'Player 2:','namePlayer' =>'namePlayer2'])
    @endcomponent
    <button type="submit" class="btn btn-primary">Start</button>
</form>
@endsection
