@extends('layouts.app')

@section('content')

<body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{Session::get('gate_name')}}</div>
                
                    <div class="card-body">
                        @if (session('status'))
                        {{ session('status') }}
                        @endif    

                        @if (session('status_error'))
                            {{ session('status_error') }}
                            <br>
                            <form method="GET" action="/DLgate/view">
                                <input  type="hidden" name='id' value={{Session::get('URL_id')}}>
                                    <button dusk="view-button" class="button_font_variable_length">view</button>
                                        <a>viewボタンを押下し再度試して下さい</a>
                                        <br>
                                        <a>※再度試しても変わらない場合はお使いのアカウントでフォロー、RT、登録、を解除した上でお試し下さい</a>

                            </form>
                        @endif 
                        <form method="GET" action="/auth/redirect/twitter">
                            @if((Session::has('Twitter_user')))
                                <a href="{{ url('/auth/redirect/twitter') }}">
                                    <button type="submit" name="Follow" class="button_font_variable_length">
                                    Twitterをフォロー
                                    </button>
                                </a>
                            @endif
                            <br>
                            @if((Session::has('Twitter_tweet')))
                                <a href="{{ url('/auth/redirect/twitter') }}">
                                    <button type="submit" name="RT" class="button_font_variable_length">
                                    TwitterをRT
                                    </button>
                            @endif
                            </form>
                            @if(Session::get('Twitter_user_sucsess') and
                                Session::get('Twitter_tweet_sucsess'))
                                    <br>
                                    <a> ダウンロードURL:{{Session::get('dl_url')}}</a>
                                    <redirect_button-component redirect_button="{{Session::get('URL_id')}}"></redirect_button-component>
                                    {{Session::flush('Twitter_user_sucsess',
                                    'Twitter_tweet_sucsess','Twitter_user',
                                    'Twitter_tweet','dl_url','URL_id')}}
                            @endif
                            </div>


                    </div>


            </div>
        </div>
    </div>
</div>






</body>
@endsection