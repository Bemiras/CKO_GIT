@extends('layouts.app')




@section('content')

<h2  style="text-align: center">PANEL - Dodanie kierunku    </h2>


<div class="panel-body"  style="text-align: center">

<form action="{{ action('DirectionofferController@store') }}" method="post" role="form" >
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div>
        Kierunek: <textarea name="name" rows="1" cols="30" ></textarea>
    </div>


    <input type="submit" value="Dodaj" class="btn btn-primary" />
    <a href="{{ action('DirectionofferController@index') }}" class="btn btn-link">Wróc</a>
</form>

</div>

@endsection('content')