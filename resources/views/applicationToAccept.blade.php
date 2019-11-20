@extends('layouts.app')

@section('content')

<h2 style="text-align: center">Podania o zmianę danych</h2>

                    @if(Auth::check() && Auth::user()->role == 'administrator')
                    @if(!count($dataBase) == 0)
                        <div class="panel-heading">  </div>
                            <table align="center"  style="width: 70%;" class="table">
                                <thead>
                                <tr>
                                    <th><h4>Numer studenta/pracownika</h4></th>
                                    <th><h4>Rola</h4></th>>
                                    <th><h4>Imię</h4></th>
                                    <th><h4>Nazwisko</h4></th>
                                    <th><h4>Wydział</h4></th>
                                    <th><h4>Kierunek</h4></th>
                                    <th><h4>Akceptuj</h4></th>
                                    <th><h4>Odrzuć</h4></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($dataBase as $data)
                                <tr>
                                        <th scope="row">{{$data->user_id}}</th>
                                        <th>{{$data->role}}</th>
                                        <th>{{$data->old_name}}          <br /> --- <br /> {{$data->name}}</th>
                                        <th>{{$data->old_lastname}}      <br /> --- <br /> {{$data->lastname}}</th>
                                        <th>{{$data->name_department}}    <br /> --- <br /> {{$data->name_department}}</th>
                                        <th>{{$data->name_direction}}     <br /> --- <br /> {{$data->name_direction}}</th>
                                        <th>
                                            <form class="form-horizontal"  method="POST" name="acceptEditChange" action="/acceptEditChange/{{($data->user_id)}}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary">Accept</button>
                                            </form>
                                        </th>
                                        <th>
                                            <form class="form-horizontal"  method="post" name="dismissEditChange" action="/dismissEditChange/{{$data->user_id}}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary">Odrzuć</button>
                                            </form>
                                        </th>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                    @else
                        <div class="panel-heading" align="center"> nic do akceptowania. </div>
                    @endif
                    @endif
@endsection('content')


