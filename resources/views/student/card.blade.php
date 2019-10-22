@extends('layouts.app')




@section('content')

<h2 style="text-align: center">PANEL - Karta obiegowa</h2>

@if (Auth::check() && Auth::user()->role == 'student' && Auth::user()->card == 'brak')
<div class="panel-body" align="center">
<h3>Wypełnij dane aby wysłać podanie o uruchomienie karty obiegowej </h3>

<form action="{{ action('CardController@store')}}" method="post" role="form" >
    
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <div class="form-group">
        <label for="title">Numer komisji:</label>
        <input align="center"  style="width: 40%;" type="number" class="form-control" name="number_commission" />
    </div>


    <input type="submit" value="Wyślij" class="btn btn-primary" />
</form>

</div>
@endif

@if (Auth::check() && Auth::user()->role == 'student' && Auth::user()->card == 'W realizacji')

<table align="center"  style="width: 40%;" class="table">
 
    @foreach ($cardlist as $card)
    <tr>
        <tr>
            <td>Akademik:</td>
            <td>{{ $card->dormitory }}</td>
        </tr>
        <tr>
            <td>Biblioteka:</td>
            <td>{{ $card->liblary }}</td>
        </tr>
        <tr>
            <td>Dziekanat:</td>
            <td>{{ $card->deanery }}</td> 
        </tr>
    </tr>
    @endforeach
@if($card->dormitory == 'zakonczona' && $card->liblary == 'zakonczona' && $card->deanery == 'zakonczona')
    <input type="submit" value="Wyślij kartę" class="btn btn-primary" />
        Auth::user()->card = 'zakonczona';
    @endif
            
</table>

@endif

@if (Auth::check() && Auth::user()->role == 'student' && Auth::user()->card == 'zakonczona')
<br>
<h4 align="center">Twoja karta została zakończona pomyślnie </h4>

@endif

@if (Auth::check() && Auth::user()->role == 'student' && Auth::user()->card == 'Rozpatrzenie')
<br>
<h4 align="center">Twoja proźba o uruchomnienie karty obiegowej została pomyślnie wysłana. </h4>
<h5 align="center">Prosimy czekać aż administrator potwierdzi jej uruchomienie. </h5>

@endif

@if (Auth::check() && Auth::user()->role == 'student' && Auth::user()->card == 'bledne dane')
<br>
<h4 align="center">Twoja proźba o uruchomnienie karty obiegowej została zakończona niepowodzeniem. </h4>
<h5 align="center">Prosimy o ponowne wypełnienie wniosku . </h5>
<div class="panel-body" align="center">
<form action="{{ action('CardController@store')}}" method="post" role="form" >
    
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <div class="form-group">
        <label for="title">Numer komisji:</label>
        <input align="center"  style="width: 40%;" type="number" class="form-control" name="number_commission" />
    </div>


    <input type="submit" value="Wyślij" class="btn btn-primary" />
</form>
</div>
@endif
@endsection('content')