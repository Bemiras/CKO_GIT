@extends('layouts.app')




@section('content')

<h2 style="text-align: center">PANEL - Edycja komisji</h2>

<div class="panel-body" align="center">
    @foreach ($commissionlist as $commission)
<form align="center" action="{{ action('CommissionsController@update',$commission->commission_id) }}" method="post" role="form" >
    {{ csrf_field() }}
    <table align="center"  style="width: 40%;" class="table">
            <label for="title">Nazwa komisji</label>
            <div>
                <textarea name="name" style="width: 40%;" rows="1" cols="30" ></textarea>
            </div></br>



            <label for="title">Wybór przewodniczącego:</label>
            <div>

                <select align="center"  style="width: 40%;" name="workerPrzewodniczacy">
                    @foreach ($workers as $worker)
                    <option value="{{ $worker->id}}">{{ $worker->name }} {{ $worker->lastname }}</option>
                    @endforeach
                </select>
            </div></br>

            <label for="title">Wybór zastępcy:</label>
            <div>

                <select align="center"  style="width: 40%;" name="workerZastepca">
                    @foreach ($workers as $worker)
                    <option value="{{ $worker->id}}">{{ $worker->name }} {{ $worker->lastname }}</option>
                    @endforeach
                </select>
            </div></br>


            <label for="title">Wybór sekretarza:</label>
            <div>

                <select align="center"  style="width: 40%;" name="workerSekretarz">
                    @foreach ($workers as $worker)
                    <option value="{{ $worker->id}}">{{ $worker->name }} {{ $worker->lastname }}</option>
                    @endforeach
                </select>
            </div></br>

            <label for="title">Wybór członka:</label>
            <div>

                <select align="center"  style="width: 40%;" name="workerCzlonek">
                    @foreach ($workers as $worker)
                    <option value="{{ $worker->id}}">{{ $worker->name }} {{ $worker->lastname }}</option>
                    @endforeach
                </select>
            </div></br>
        @endforeach

            <br>
            <input type="submit" value="Zamień" class="btn btn-primary" />
            <a href="{{ action('CommissionsController@index') }}" class="btn btn-link">Wróc</a>
        </table>
        </form>
    </div>


@endsection('content')