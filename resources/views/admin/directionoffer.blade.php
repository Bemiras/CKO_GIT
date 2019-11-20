@extends('layouts.app')




@section('content')

<h2 style="text-align: center">PANEL - Kierunki </h2>


<table align="center"  style="width: 40%;" class="table">
    <thead>
    <tr>
        <th><h4>Kierunek:</h4></th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($userlist as $user)
    <tr>
        <th>{{$user->name}}</th>
        <th><a  href="{{ action('DirectionofferController@edit', $user->id) }}"><img src={{ asset('images/edit.png') }}  /></a></th>
        <th><a  href="{{ action('DirectionofferController@destroy', $user->id) }}"><img src={{ asset('images/delete.png') }}  /></a></th>
    </tr>
    @endforeach
    </tbody>
</table>

<div align="center" class="panel-body">
    <a style="width: 15%;" href="{{ action('DirectionofferController@create') }}" class="btn btn-info">Dodaj kierunek</a>
</div>



@endsection('content')