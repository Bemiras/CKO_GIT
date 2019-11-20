@extends('layouts.app')

@section('content')

<h2 style="text-align: center">PANEL - Edycja roli pracownika</h2></br>

<div class="panel-body" >
    @foreach ($workerlist as $worker)
    <form action="{{ action('UserroleController@update', $worker->user_id   ) }}" method="post" role="form" >
        {{ csrf_field() }}
        <table align="center"  style="width: 40%;" class="table">

            <tr>
                <td>Numer pracownika (login):</td>
                <td >{{$worker->user_id}}</td>
            </tr>
            <tr>
                <td>Imię:</td>
                <td> {{$worker->user_name}}</td>
            </tr>
            <tr>
                <td>Nazwisko:</td>
                <td>{{$worker->user_lastname}}</td>
            </tr>
            <tr>
                <td>Wydział:</td>
                <td>{{$worker->name_department}}</td>
            </tr>
            <tr>
                <td>Specjalizacja:</td>
                <td><select align="center" style="width: 70%;" name="specialization">
                            <option selected>promotor</option>
                            <option>sekretarz</option>
                            <option>akademik</option>
                            <option>dziekanat</option>
                            <option>biblioteka</option>
                            <option>studium wychowania fizycznego</option>
                            <option>katedra</option>
                            <option>NULL</option>
                        </select></br></td>
            </tr>
            @endforeach
        </table>
<div style="text-align: center">
    <input type="submit" value="Edytuj" class="btn btn-primary" />
    <a href="{{ action('UserroleController@index') }}" class="btn btn-link">Powrót</a>
</div>

</form>
</div>


@endsection('content')