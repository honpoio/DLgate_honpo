@extends('layouts.app')


<!DOCTYPE html>


<html lang="ja">
<head>

</head>
<body>
@section('content')

<form method="GET" action="/DLgate/create">
    <button dusk="view-button" class="button_font_variable_length" >gateを新規作成する</button>
</form>
</nav>
<div class="card">
@if(isset($dlgate_table))
@foreach($dlgate_table as $row)
    <div class="card-header">ゲート名:{{$row->gate_name}}
    <br>
        作成ゲート数:{{$loop->iteration}}
    </div>
    <div class="card-body">
        <div class="form-group row">
            DL_url: {{$row->dl_url}}
        </div>
        <div class="form-group row">
            twitterUser: {{$row->Twitter_user}}
        </div>
        <div class="form-group row">
            tweetid: {{$row->Twitter_tweet}}
        </div>
    </div>
        <form method="GET" action="/DLgate/view">
            <input  type="hidden" name='id' value={{$row->URL_id}}>
                <button dusk="view-button" class="button_font_variable_length">view</button>
        </form>

        

    
        <redirect_button-component redirect_button="{{url('/')}}/DLgate/view?id={{ $row['URL_id'] }}"></redirect_button-component>

    <!-- bodyタグ内の下部に以下を入力する -->
    <form method="GET" action="/update">
        <input type="hidden" name="URL_id" value={{$row["URL_id"]}}>
        <button dusk="view-button" class="button_font_variable_length">update</button>
    </form>

    <form method="POST" action="/delete">
    @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="URL_id" value={{$row["URL_id"]}}>
        <button dusk="view-button" class="button_font_variable_length">delete</button>
    </form>
@endforeach
@endif




</body>
</html>
@endsection

