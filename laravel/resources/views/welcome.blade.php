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
                    ここには使用方法を記述する
        </div>
    </body>
</html>

@endsection
