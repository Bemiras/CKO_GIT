@extends('layouts.app')




@section('content')

<h2 style="text-align: center">PANEL - Pracowników</h2></br>

<table align="center"  style="width: 70%;" class="table">
    <thead>
     <tr>
         <th><h4>Numer pracownika</h4></th>
         <th><h4>Imię</h4></th>
         <th><h4>Nazwisko</h4></th>
         <th><h4>Wydział</h4></th>
         <th><h4>Specjalizacja</h4></th>
     </tr>
    </thead>
    <tbody>
    @foreach ($workerlist as $worker)
    <tr>
        <th scope="row">{{$worker->user_id}}</th>
        <th>{{$worker->user_name}}</th>
        <th>{{$worker->user_lastname}}</th>
        <th>{{$worker->name_department}}</th>
        @if($worker->user_specialization != NULL)
            <th>{{$worker->user_specialization}}</th>
        @else
            <th></th>
        @endif
        <th><a  href="{{ action('UserroleController@edit', $worker->id) }}"><img src={{ asset('images/edit.png') }}  /></a></th>
    </tr>
    @endforeach
    </tbody>
</table>







@endsection('content')