@extends('layouts.app')




@section('content')

<h2 style="text-align: center">PANEL - Oczekujące podania</h2>

@if ( Auth::user()->specialization == 'dziekanat' )
<table align="center"  style="width: 40%;" class="table">
    <thead>
    <tr>
        <th>Numer studenta</th>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>WPIS Dziekanat</th>
        <th></th>
        <th></th>
        
    </tr>
    </thead>
    <tbody>
    @foreach ($userlist as $user)
    <tr>
    @if ($user->deanery == 'W trakcie' && $user->card == 'W realizacji' )
        <th scope="row">{{$user->id_student}}</th>
        <th>{{$user->name_student}}</th>
        <th>{{$user->lastname_student}}</th>
        <th>{{$user->deanery}}</th>
        <th><a  href="{{ action('PendingapplicationController@updateYesDeanery', $user->id_card) }}">
                <img src={{ asset('images/akcept.png') }}  /></a></th>
        <th><a  href="{{ action('PendingapplicationController@updateNoDeanery', $user->id_card) }}">
                <img src={{ asset('images/notAkcept.png') }}  /></a></th>
        <th><a  href="{{ action('MessageController@newMessage', $user->id) }} "target="_blank">
                <img src={{ asset('images/message.png') }}  /></a></th>
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
        
    </tr>
    </thead>
    <tbody>
    @foreach ($userlist as $user)
    <tr>
    @if ($user->liblary == 'W trakcie' && $user->card == 'W realizacji')
        <th scope="row">{{$user->id_student}}</th>
        <th>{{$user->name_student}}</th>
        <th>{{$user->lastname_student}}</th>
        <th>{{$user->liblary}}</th>
        <th><a  href="{{ action('PendingapplicationController@updateYesLiblary', $user->id_card) }}">
                <img src={{ asset('images/akcept.png') }}  /></a></th>
        <th><a  href="{{ action('PendingapplicationController@updateNoLiblary', $user->id_card) }}">
                <img src={{ asset('images/notAkcept.png') }}  /></a></th>
        <th><a  href="{{ action('MessageController@newMessage', $user->id) }} "target="_blank">
                <img src={{ asset('images/message.png') }}  /></a></th>

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
        
    </tr>
    </thead>
    <tbody>
    @foreach ($userlist as $user)
    <tr>
    @if ($user->dormitory == 'W trakcie' && $user->card == 'W realizacji')
        <th scope="row">{{$user->id_student}}</th>
        <th>{{$user->name_student}}</th>
        <th>{{$user->lastname_student}}</th>
        <th>{{$user->dormitory}}</th>

        <th><a  href="{{ action('PendingapplicationController@updateYesDormitory', $user->id_card) }}">
                <img src={{ asset('images/akcept.png') }}  /></a></th>
        <th><a  href="{{ action('PendingapplicationController@updateNoDormitory', $user->id_card) }}">
                <img src={{ asset('images/notAkcept.png') }}  /></a></th>
        <th><a  href="{{ action('MessageController@newMessage', $user->id) }} "target="_blank">
                <img src={{ asset('images/message.png') }}  /></a></th>
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

    </tr>
    </thead>
    <tbody>
    @foreach ($userlist->unique() as $user)
    <tr>
        @if ($user->promoter == 'W trakcie' && $user->card == 'W realizacji' && Auth::user()->id == $user->userPromoter)
        <th scope="row">{{$user->id_student}}</th>
        <th>{{$user->name_student}}</th>
        <th>{{$user->lastname_student}}</th>
        <th>{{$user->promoter}}</th>
        <th><a  href="{{ action('PendingapplicationController@updateYesPromoter', $user->id_card) }}">
                <img src={{ asset('images/akcept.png') }}  /></a></th>
        <th><a  href="{{ action('PendingapplicationController@updateNoPromoter', $user->id_card) }}">
                <img src={{ asset('images/notAkcept.png') }}  /></a></th>
        <th><a  href="{{ action('MessageController@newMessage', $user->id) }} "target="_blank">
                <img src={{ asset('images/message.png') }}  /></a></th>
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
        
    </tr>
    </thead>
    <tbody>
    @foreach ($userlist->unique('name') as $user)
    <tr>
        @if ($user->card == 'Rozpatrzenie' && Auth::user()->id == $user->worker_commission_id && $user->commission_id == $user->user_commission_id )
        <th scope="row">{{$user->id_student}}</th>
        <th>{{$user->name_student}}</th>
        <th>{{$user->lastname_student}}</th>
        <th>{{$user->name_department}}</th>
        <th>{{$user->name_direction}}</th>
        <th><a  href="{{ action('PendingapplicationController@updateYesCard', $user->id) }}">
                <img src={{ asset('images/akcept.png') }}  /></a></th>
        <th><a  href="{{ action('PendingapplicationController@updateNoCard', $user->id) }}">
                <img src={{ asset('images/notAkcept.png') }}  /></a></th>
        <th><a  href="{{ action('MessageController@newMessage', $user->id) }} "target="_blank">
                <img src={{ asset('images/message.png') }}  /></a></th>
    @endif
    </tr>
    @endforeach
    </tbody>
</table>
@endif

@endsection('content')