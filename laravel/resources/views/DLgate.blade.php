@extends('layouts.app')


<!DOCTYPE html>


<html lang="ja">
<head>
<!-- [if lt IE 9] -->
<!-- [endif] -->
</head>
<body>
@section('content')

<form method="GET" action="/DLgate/create">
    <button dusk="view-button" class="btn　btn-primary" >gateを新規作成する</button>
</form>
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
        <hello-world-component test="http://127.0.0.1:8000/DLgate/view?id={{ $row['URL_id'] }}"></hello-world-component>



    <!-- bodyタグ内の下部に以下を入力する -->
    <form method="GET" action="/update">
        <input type="hidden" name="URL_id" value={{$row["URL_id"]}}>
        <input type="submit" value="{{$row->gate_name}}をupdateする" style="width:160px">
    </form>

    <form method="POST" action="/delete">
    @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="URL_id" value={{$row["URL_id"]}}  style="width:160px">
        <input type="submit" value="{{$row->gate_name}}をdeleteする">
    </form>

    
@endforeach
@endif




</body>
</html>
@endsection

