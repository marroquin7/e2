@extends('templates.master') @section('title') Project 3 @endsection @section('content')

<h2>Rock, Paper, Scissors Game Simulator</h2>

<h2>DGMD E-2 Project 3</h2>
<b>Author:</b> Cesar Marroquin
<h2> Instructions</h2>
<ul>
    <li>Select either Rock, Paper or Scissors, and click on "Throw" to play against the computer</li>
    <li>A tie is declared if both players throw the same move.</li>
    <li>Otherwise: Rock beats Scissors, Scissors beats Paper, Paper beats Rock.</li>
</ul>
<form method='POST' action="play">
    <input type='radio' name='player' value='Rock' id='Rock'>
    <label for='Rock'>Rock</label>
    <input type='radio' name='player' value='Paper' id='Paper'>
    <label for='Paper'>Paper</label>
    <input type='radio' name='player' value='Scissors' id='Scissors'>
    <label for='Scissors'>Scissors</label>
    <button type="submit">Throw</button>
</form>


<?php if (isset($results)) {?>
<div>
    @foreach($results as $result)
    <ul>
        <li>You threw:
            <b> {{$result['player']}}</b>
        </li>
        <li>The computer threw:
            <b>{{$result['computer']}} </b>
        </li>
        <li>Result:
            <b> {{$result['outcome']}}</b>
        </li>
        <li> Date and Time:
            <b> {{$result['timestamp']}}</b>
        </li>
    </ul>
    @endforeach

</div>
<?php } ?>
<h4>
    <a href="records">View all Session Records</a>
</h4>


@endsection