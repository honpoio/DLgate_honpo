@extends('layouts.app')

@section('content')

<body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{Session('DLgate_session')['gate_name']}}</div>
                
                    <div class="card-body">
                        @if (session('status'))
                        {{session('status')}}
                        @endif    

                        @if (session('status_error'))
                            {{ session('status_error') }}
                            <br>
                            <form method="GET" action="/DLgate/view">
                                <input  type="hidden" name='id' value={{Session('DLgate_session')['URL_id']}}>
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
                            <br>

                            @if((Session::has('youtube_channel_id')))
                                <a href="{{Session::get('youtube_redirect')}}">
                                    <button type="submit" name="RT" class="button_font_variable_length_withdrawal">
                                    youtubeを登録
                                    </button>
                                </a>
                            @endif
                            </form>
                            @if(Session::has('Twitter_user_sucsess') and
                                Session::has('Twitter_tweet_sucsess')and
                                Session::has('youtube_channel_id_sucsess')
                                )
                                    <br>
                                    <a> ダウンロードURL:{{Session('DLgate_session')['dl_url']}}</a>
                                    <redirect_button-component redirect_button="{{Session('DLgate_session')['dl_url']}}"></redirect_button-component>
                                    {{Session::flush(
                                        'DLgate_session',
                                        'Twitter_user',
                                        'Twitter_user_sucsess',
                                        'Twitter_tweet',
                                        'Twitter_tweet_sucsess'
                                        )}}
                            @endif
                            </div>


                    </div>


            </div>
        </div>
    </div>
</div>






</body>
@endsection