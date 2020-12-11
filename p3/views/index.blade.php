@extends('templates.master') @section('title') Project 3 @endsection @section('content') @if($app->errorsExist())
<ul class='error alert alert-danger'>
    @foreach($app->errors() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<h2>Rock, Paper, Scissors Game Simulator</h2>

<h2>DGMD E-2 Project 3</h2>
<b>Author:</b> Cesar Marroquin
<h2> Instructions</h2>
<ul>
    <li>Select either Rock, Paper or Scissors, and click on "Throw" to play against the computer</li>
    <li>A tie is declared if both players throw the same move.</li>
    <li>Otherwise: Rock beats Scissors, Scissors beats Paper, Paper beats Rock.</li>
</ul>

<form method='POST' action="/play">
    <input type='radio' name='player' value='Rock' id='Rock'>
    <label for='Rock'>Rock</label>
    <input type='radio' name='player' value='Paper' id='Paper'>
    <label for='Paper'>Paper</label>
    <input type='radio' name='player' value='Scissors' id='Scissors'>
    <label for='Scissors'>Scissors</label>
    <button type="submit">Throw</button>
</form>
@if($results)

<ul>
    <li>You threw:
        <b> {{$results['player']}}</b>
    </li>
    <li>The computer threw:
        <b>{{$results['computer']}} </b>
    </li>
    <li>Result:
        <b> {{$results['outcome']}}</b>
    </li>
    <li> Date and Time:
        <b> {{$results['timestamp']}}</b>
    </li>

</ul>@endif
<h4>
    <a href="records">View all Session Records</a>
</h4>


@endsection