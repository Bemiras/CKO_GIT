@extends('layouts.app')




@section('content')

<h2 style="text-align: center">PANEL - Lista użytkowników</h2>

<table align="center"  style="width: 70%;" class="table">
    <thead>
    <tr>
        <th><h4>Numer studenta</h4></th>
        <th><h4>Imię</h4></th>
        <th><h4>Nazwisko</h4></th>
        <th><h4>Wydział</h4></th>
        <th><h4>Kierunek</h4></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($userlist as $user)
    <tr>
        <th scope="row">{{$user->id}}</th>
        <th>{{$user->name_user}}</th>
        <th>{{$user->lastname}}</th>
        <th>{{$user->name_department}}</th>
        <th>{{$user->name_direction}}</th>

    </tr>
    @endforeach
    </tbody>
</table>



@endsection('content')