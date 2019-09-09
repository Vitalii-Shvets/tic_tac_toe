@extends('layouts.app')
@section('content')
    <h3>Playing the game: $player1 and $player2</h3>
    <h1 id="inf-player"></h1>
    <br/>
    <table border="2" id="click-table">
        @for ($i = 0; $i < 3; $i++)
            @component('components.tableComponent')
            @endcomponent
        @endfor
    </table>
    <br>
    <a class="navbar-brand" href="#">Start the game again</a>
@endsection
