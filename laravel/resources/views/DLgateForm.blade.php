@extends('layouts.app')

@section('content')

<body>
@if($dlgate_table ?? '')
@foreach($dlgate_table ?? '' as $row)
    <a>{{$row->gate_name}}</a><br>
    @if(Session::get('Twitter_user_sucsess')?? '' and
        Session::get('Twitter_tweet_sucsess')?? '')
        <a>ダウンロードURL{{$row->dl_url}}</a><br>
            {{Session::flush()}}
    @endif



<form method="GET" action="/auth/redirect/twitter">

        @if(isset($row->Twitter_user))
            <a href="{{ url('/auth/redirect/twitter') }}">
            <button type="submit" name="Follow"　>
            Twitterをフォロー
            </button>
            </a>
        @endif

        @if(isset($row->Twitter_tweet))
            <a href="{{ url('/auth/redirect/twitter') }}">
            <button type="submit" name="RT">
                TwitterをRT
            </button>
        @endif
@endforeach
@endif

</form>
</body>