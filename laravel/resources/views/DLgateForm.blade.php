@extends('layouts.app')

@section('content')

@if($dlgate_table ?? '')
@foreach($dlgate_table ?? '' as $row)
<body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$row->gate_name}}</div>
                
                    <div class="card-body">
                        <form method="GET" action="/auth/redirect/twitter">
                            @if(!empty(Session::get('Twitter_user')))
                                <a href="{{ url('/auth/redirect/twitter') }}">
                                    <button type="submit" name="Follow" class="button_font_variable_length">
                                    Twitterをフォロー
                                    </button>
                                </a>
                            @endif
                            <br>
                            @if(!empty(Session::get('Twitter_tweet')))
                                <a href="{{ url('/auth/redirect/twitter') }}">
                                    <button type="submit" name="RT" class="button_font_variable_length">
                                    TwitterをRT
                                    </button>
                            @endif
                            </form>
                            @if(Session::get('Twitter_user_sucsess') and
                                Session::get('Twitter_tweet_sucsess'))
                                    <br>
                                    <a> ダウンロードURL:{{$row->dl_url}}</a>
                                    <redirect_button-component redirect_button="{{$row->dl_url}}"></redirect_button-component>
                                    {{Session::flush('Twitter_user_sucsess')}}
                                    {{Session::flush('Twitter_tweet_sucsess')}}
                            @endif
                            </div>


                    </div>


            </div>
        </div>
    </div>
</div>





@endforeach
@endif

</body>
@endsection