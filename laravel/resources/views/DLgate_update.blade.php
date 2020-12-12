<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="utf-8">
    </head>
    <body>
@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    
@endif

    @foreach($dlgate_table as $row)
    <form method="POST" action="/update/add">
    @csrf
    @method('PUT')
    <input type="text" name="Twitter_user" value={{$row["Twitter_user"]}}>
    <input  type="text" name="tweet_id" value={{$row["Twitter_tweet"]}}>
    <input  type="text" name="gate_name" value={{$row["gate_name"]}}>
    <input  type="text" name="dl_url" value={{$row["dl_url"]}}>
    @endforeach
    
    
        <input type="hidden" name="URL_id" value={{$row["URL_id"]}}>
        <input type="submit" value="add">
    </form>
    </body>
</html>