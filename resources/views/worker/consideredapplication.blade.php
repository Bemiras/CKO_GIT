@extends('layouts.app')




@section('content')

<h2 style="text-align: center">PANEL - Rozpatrzone podania</h2>


@if ( Auth::user()->specialization == 'dziekanat' )
<table align="center"  style="width: 40%;" class="table">
    <thead>
    <tr>
        <th>Numer studenta</th>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>WPIS Dziekanat</th>
        <th>Cofnij</th>
        
    </tr>
    </thead>
    <tbody>
    @foreach ($userlist as $user)
    <tr>
    @if ($user->deanery == 'Zakonczona' OR $user->deanery == 'Niepowodzenie' && $user->card == 'W realizacji')
        <th scope="row">{{$user->id_student}}</th>
        <th>{{$user->name_student}}</th>
        <th>{{$user->lastname_student}}</th>
        <th>{{$user->deanery}}</th>
        <th><a  href="{{ action('ConsideredapplicationController@updateResetDeanery', $user->id_card) }}">
                <img src={{ asset('images/notAkcept.png') }}  /></a></th>
        @endif
    </tr>
    @endforeach
    </tbody>
</table>


@elseif ( Auth::user()->specialization == 'biblioteka' )
<table align="center"  style="width: 40%;" class="table">
    <thead>
    <tr>
        <th>Numer studenta</th>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>WPIS Biblioteka</th>
        <th>Cofnij</th>
        
    </tr>
    </thead>
    <tbody>
    @foreach ($userlist as $user)
    <tr>
    @if ($user->liblary == 'Zakonczona' OR $user->liblary == 'Niepowodzenie' && $user->card == 'W realizacji')
        <th scope="row">{{$user->id_student}}</th>
        <th>{{$user->name_student}}</th>
        <th>{{$user->lastname_student}}</th>
        <th>{{$user->liblary}}</th>
        <th><a  href="{{ action('ConsideredapplicationController@updateResetLiblary', $user->id_card) }}">
                <img src={{ asset('images/notAkcept.png') }}  /></a></th>
        @endif
    </tr>
    @endforeach
    </tbody>
</table>

@elseif ( Auth::user()->specialization == 'akademik' )
<table align="center"  style="width: 40%;" class="table">
    <thead>
    <tr>
        <th>Numer studenta</th>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>WPIS Akademik</th>
        <th>Cofnij</th>
        
    </tr>
    </thead>
    <tbody>
    @foreach ($userlist as $user)
    <tr>
    @if ($user->dormitory == 'Zakonczona' OR $user->dormitory == 'Niepowodzenie' && $user->card == 'W realizacji')
        <th scope="row">{{$user->id_student}}</th>
        <th>{{$user->name_student}}</th>
        <th>{{$user->lastname_student}}</th>
        <th>{{$user->dormitory}}</th>
        <th><a  href="{{ action('ConsideredapplicationController@updateResetDormitory', $user->id_card) }}">
                <img src={{ asset('images/notAkcept.png') }}  /></a></th>
        @endif
    </tr>
    @endforeach
    </tbody>
</table>

@elseif ( Auth::user()->specialization == 'promotor' )
<table align="center"  style="width: 40%;" class="table">
    <thead>
    <tr>
        <th>Numer studenta</th>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>WPIS Promotor</th>
        <th>Cofnij</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($userlist as $user)
    <tr>
        @if ($user->promoter == 'Zakonczona' OR $user->promoter == 'Niepowodzenie' && $user->card == 'W realizacji' && Auth::user()->id == $user->userPromoter)
        <th scope="row">{{$user->id_student}}</th>
        <th>{{$user->name_student}}</th>
        <th>{{$user->lastname_student}}</th>
        <th>{{$user->promoter}}</th>
        <th><a  href="{{ action('ConsideredapplicationController@updateResetPromoter', $user->id_card) }}">
                <img src={{ asset('images/notAkcept.png') }}  /></a></th></th>
        @endif
    </tr>
    @endforeach
    </tbody>
</table>

@elseif ( Auth::user()->specialization == 'sekretarz' )
<table align="center"  style="width: 40%;" class="table">
    <thead>
    <tr>
        <th>Numer studenta</th>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Wydział</th>
        <th>Kierunek</th>
        <th>Cofnij</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($userlist->unique('name') as $user)
    <tr>
        @if ($user->card == 'W realizacji' && Auth::user()->id == $user->worker_commission_id && $user->commission_id == $user->user_commission_id )
        <th scope="row">{{$user->id_student}}</th>
        <th>{{$user->name_student}}</th>
        <th>{{$user->lastname}}</th>
        <th>{{$user->name_department}}</th>
        <th>{{$user->name_direction}}</th>
        <th><a  href="{{ action('ConsideredapplicationController@updateResetPromoter', $user->id_card) }}">
                <img src={{ asset('images/notAkcept.png') }}  /></a></th></th>
        @endif
    </tr>
    @endforeach
    </tbody>
</table>
@endif



@endsection('content')