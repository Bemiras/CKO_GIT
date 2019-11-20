
@extends('layouts.app')
@section('content')


@section('content')
<h2 style="text-align: center">PANEL - Nowa Wiadomość</h2>


<div class="panel-body" align="center">
    @foreach ($userlist as $user)
    <form action="{{ action('MessageController@sendMessage', $user->student_id) }}" method="post" role="form" >
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />


        <label name="recipient_name" ><h4>ODBIORCA:  {{$user->student_name}} {{$user->student_lastname}}  {{$user->student_id}}</h4></label>


        <div>
            <textarea name="message" style="width: 40%;" rows="10" cols="30" ></textarea>
        </div></br>
            <input type="hidden" value="{{ Auth::user()->id }}" name="sender"/>
            <input type="hidden" value="{{$user->student_id}}" name="recipient"/>

        </br>
        @endforeach

        <input type="submit" value="Wyślij wiadomość" class="btn btn-primary" />
    </form>

</div>


@endsection('content')
@endsection