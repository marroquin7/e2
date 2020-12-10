@extends('templates.master') @section('title') Record {{$round['id']}} @endsection @section('content')
<h2>Details</h2>
<br>
<a href="/records">Back to all game records</a>
</br>
<br>
<div>You threw:
    <b>{{ $round['player'] }}
</div>
</b>
<div> The Computer threw:
    <b>{{ $round['computer'] }}
</div>
</b>
<div>Result:
    <b>{{ $round['outcome'] }}
</div>
</b>
<div>Date and Time:
    <b>{{ $round['timestamp'] }}
</div>
</b>
</br>

@endsection