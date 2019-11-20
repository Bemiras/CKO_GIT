
@extends('layouts.app')
@section('content')


@section('content')
<h2 style="text-align: center">PANEL - Wiadomosci wysłane</h2><br>

<table align="center"  style="width: 70%;" class="table">
    <thead>
    <tr>
        <th><h4>Odbiorca</h4></th>
        <th><h4>Stanowisko</h4></th>
        <th><h4>Treść</h4></th>
        <th><h4>Data</h4></th>
        <th><h4>Wyślij odpowiedz</h4></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($messagelistRecipient as $messageRecipient)
        @if($messageRecipient->sender == Auth::user()->id)
        <tr>
            <th>{{$messageRecipient->messageRecipient_name}} {{$messageRecipient->messageRecipient_lastname}}
                ({{$messageRecipient->messageRecipient_id}}) </th>
            <th>{{$messageRecipient->messageRecipient_specialization}}</th>
            <th>{{$messageRecipient->message}}</th>
            <th>{{$messageRecipient->data}}</th>
            <th><a  href="{{ action('MessageController@newMessage', $messageRecipient->messageRecipient_id) }} "target="_blank">
                    <img src={{ asset('images/message.png') }}  /></a></th>
        </tr>
        @endif
    @endforeach
    </tbody>
</table>


@endsection('content')
@endsection