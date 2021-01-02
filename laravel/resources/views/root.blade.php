@extends('layouts.app')

@section('content')

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>simple DL gate</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->

    </head>
    <body> 

    @if (session('status'))
    {{ session('status') }}
    @endif    

    <div class="container">
    
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        

                    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                    @else
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">

                <br>
                <div class="container mb-3">
                    <div class="card ml-auto mrauto">
                        <div class="card-body">
                            <ul>
                            <h1>DLgateとは</h1>
                                <li>当サービスの概要</li>
                                <a>各種SNSサービスのフォロー、RT、いいねを引き換えにデータを無料で提供できるサービスです</a>
                                <li>使用方法</li>
                                <a>ログイン後右上のユーザー名を押下し、myDLgateをクリックします</a>
                                <br>
                                <img src="image/howto_gate_preview.jpg" class= "image-view">
                                <br>
                                <a>gateの新規作成をクリックします</a>
                                <br>
                                <img src="image/howto_gate_create_preview.png" class= "image-view">
                                <br>
                                <a>ゲート名、公開可能なDLurl、他認証させたいsnsを登録しaddボタンを押下します</a>
                                <br>
                                <img src="image/howto_gate_create_input_preview.png" class= "image-view">
                                <br>
                                <a>urlをユーザーに公開することでgateデータを無料で提供できます</a>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
    </body>
</html>

@endsection
