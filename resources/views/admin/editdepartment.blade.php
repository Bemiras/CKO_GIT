@extends('layouts.app')




@section('content')

<h2 style="text-align: center">PANEL - Edycja wydziału</h2>

<div class="panel-body" style="text-align: center">
<form action="{{ action('DepartmentofferController@update', $department->id) }}" method="post" role="form" >
    {{ csrf_field() }}

    <div >
        Wydział: <textarea name="name" rows="1" cols="30" ></textarea>
    </div>

    <input type="submit" value="Zamień" class="btn btn-primary" />
    <a href="{{ action('DepartmentofferController@index') }}" class="btn btn-link">Powrót</a>
</form>
</div>


@endsection('content')