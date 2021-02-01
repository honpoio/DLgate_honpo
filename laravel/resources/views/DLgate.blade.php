@extends('layouts.app')

<body>
@section('content')
@if (session('status'))
    <a>{{ session('status') }}</a>
    @endif
<form method="GET" action="/DLgate/create">
    <button dusk="view-button" class="button_font_variable_length" >gateを新規作成する</button>
</form>
<div class="card">
@if(isset($dlgate_table))
@foreach($dlgate_table as $row)
    <div class="card-header">ゲート名:{{$row->gate_name}}
    <br>
        作成ゲート数:{{$loop->iteration}}
    </div>
    <div class="card-body">

        <div class="text-wrap">
            DL_url:{{$row->dl_url}}
        </div>
        <div class="text-wrap">
            twitterUser:{{$row->Twitter_user}}
        </div>
        <div class="text-wrap">
            tweetid:{{$row->Twitter_tweet}}
        </div>
        <div class="text-wrap">
            youtube_channel_id:{{$row->youtube_channel_id}}
        </div>
    </div>

        
        <redirect_button-component redirect_button="{{url('/')}}/DLgate/view?id={{ $row['URL_id'] }}"></redirect_button-component>

    
    <form method="GET" action="/DLgate/update">
        <input type="hidden" name="URL_id" value={{$row["URL_id"]}}>
        <button dusk="view-button" class="button_font_variable_length">update</button>
    </form>

    <form method="POST" action="/DLgate/delete">
    @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="URL_id" value={{$row["URL_id"]}}>
        <button dusk="view-button" class="button_font_variable_length">delete</button>
    </form>
@endforeach
@endif




</body>
@endsection

