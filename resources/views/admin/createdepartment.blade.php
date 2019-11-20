@extends('layouts.app')




@section('content')

<h2  style="text-align: center">PANEL - Dodanie wydziału    </h2></br>


<div class="panel-body"  style="text-align: center">

<form action="{{ action('DepartmentofferController@store') }}" method="post" role="form" >
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div>
        <h4>Wydział:     <textarea name="name" rows="1" cols="30" ></textarea></h4>
    </div></br>


    <input type="submit" value="Dodaj" class="btn btn-primary" />
    <a href="{{ action('DepartmentofferController@index') }}" class="btn btn-link">Wróc</a>
</form>

</div>

@endsection('content')