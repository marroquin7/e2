@extends('templates.master') @section('title') Records @endsection @section('content')
<h2>History</h2>
<h3>
    <a href="/">Back to the Game</a>
</h3>
<br> @foreach($rounds as $round)
<br>
<a href='/record?id={{ $round["id"] }}'>


    <div>{{ $round['timestamp'] }}</div>
</a>
</br>


@endforeach</br>

@endsection