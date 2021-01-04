<<<<<<< HEAD
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

=======
<!DOCTYPE html>


<html lang="ja">
<head>
<meta charset="utf-8">
<title>サイトタイトル</title>
<meta name="description" content="ディスクリプションを入力">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<!-- [if lt IE 9] -->
<!-- [endif] -->
<script src="main.js"></script>
</head>
<body>
@if(isset($dlgate_table))
@foreach($dlgate_table as $row)
    <a>{{$row->gate_name}}</a><br>
    <a>{{$row->dl_url}}</a><br>
    <!-- <a href="http://localhost:8000/testDLgate{{$row->URL_id}}">test</a> -->
    <form method="GET" action="/DLgate/view">
        <input type="hidden" name='id' value={{$row->URL_id}}>
        <button dusk="view-button">view</button>
    </form>
    <br>
    <a>{{$loop->iteration}}</a><br>

    <form method="POST" action="/delete">
    @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="URL_id" value={{$row["URL_id"]}}>
        <input type="submit" value="delete">
    </form>
    <form method="GET" action="/update">
        <input type="hidden" name="URL_id" value={{$row["URL_id"]}}>
        <input type="submit" value="update">
    </form>

    
@endforeach
@endif
<form method="GET" action="/DLgate/create">
    <input type="submit" value="create">
</form>
<!----- header----->
<header>ヘッダー</header>
<nav>ナビ</nav>
<!----- /header ----->
<!----- main ----->



<article>
<h1>DLgate一覧</h1>

<section>




<p>コンテンツの内容</p>
</section>
</article>
<!----- /main ----->

<!----- footer ----->
<footer>フッター</footer>
<!----- /footer ----->

</body>
</html>
>>>>>>> test
