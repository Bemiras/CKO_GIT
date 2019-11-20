@extends('layouts.app')




@section('content')

<h2 style="text-align: center">PANEL - Edycja kierunku</h2>

<div class="panel-body" style="text-align: center">
<form action="{{ action('DirectionofferController@update', $direction->id) }}" method="post" role="form" >
    {{ csrf_field() }}

    <div >
        Wydział: <textarea name="name" rows="1" cols="30" ></textarea>
    </div>

    <input type="submit" value="Zamień" class="btn btn-primary" />
    <a href="{{ action('DirectionofferController@index') }}" class="btn btn-link">Powrót</a>
</form>
</div>


@endsection('content')