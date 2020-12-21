@extends('layouts.app')


<!DOCTYPE html>


<html lang="ja">
<head>
<!-- [if lt IE 9] -->
<!-- [endif] -->
<script src="main.js"></script>
</head>
<body>
@section('content')

</nav>
<div class="card">
@if(isset($dlgate_table))
@foreach($dlgate_table as $row)
    <div class="card-header">ゲート名:{{$row->gate_name}}
    <br>
    作成ゲート数:{{$loop->iteration}}</div>
    <div>DL_url:{{$row->dl_url}}
        <div style="display:inline-flex">
        <form method="GET" action="/DLgate/view">
            <input type="hidden" name='id' value={{$row->URL_id}}>
                <button dusk="view-button" class="btn　btn-primary" >view</button>
        </div>
        </form>
        
        <div style= "position: absolute; opacity:0;">
            <input id="copyTarget{{$loop->iteration}}" type="text" value="http://localhost:8000/DLgate/view{{$row->URL_id}}"readonly>
        </div>
            <button onclick="copyToClipboard({{$loop->iteration}})">URLをコピーする</button>
    </div>

    <script>
        function copyToClipboard(index){
        // コピー対象をJavaScript上で変数として定義する
        var copyTarget = document.getElementById("copyTarget" + index);

        // コピー対象のテキストを選択する
        copyTarget.select();

        // 選択しているテキストをクリップボードにコピーする
        document.execCommand("Copy");

        // コピーをお知らせする
        alert("URLをコピーできました！ : " + copyTarget.value);
    }
    </script>

    <!-- bodyタグ内の下部に以下を入力する -->
    <form method="GET" action="/update">
        <input type="hidden" name="URL_id" value={{$row["URL_id"]}}>
        <input type="submit" value="update">
    </form>

    <form method="POST" action="/delete">
    @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="URL_id" value={{$row["URL_id"]}}>
        <input type="submit" value="delete">
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
@endsection

