@extends('layouts.app')




@section('content')

<h2 style="text-align: center">PANEL - Wydziały </h2>

<table align="center"  style="width: 40%;" class="table">
    <thead>
    <tr>
        <th><h4>Wydział:</h4></th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($userlist as $user)
    <tr>
        <th>{{$user->name}}</th>
        <th><a  href="{{ action('DepartmentofferController@edit', $user->id) }}"><img src={{ asset('images/edit.png') }}  /></a></th>
        <th><a  href="{{ action('DepartmentofferController@destroy', $user->id) }}"><img src={{ asset('images/delete.png') }}  /></a></th>
    </tr>
    @endforeach
    </tbody>
</table>

<div align="center" class="panel-body">
    <a style="width: 15%;" href="{{ action('DepartmentofferController@create') }}" class="btn btn-info">Dodaj wydział</a>
</div>



@endsection('content')