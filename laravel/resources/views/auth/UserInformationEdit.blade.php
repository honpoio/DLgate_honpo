<!DOCTYPE html>
<html lang="ja">
<head>
<title>タイトル</title>
</head>
<body>
<a>ユーザー名は変更できません</a>
<br>

<form method="POST" action="/user/edit/email">
@csrf
    <a>メールアドレスを変更</a>
    <br>
    <input type="text" name="Email" value={{$auth["email"]}}>

    <input type="hidden" name="UserId" value={{$auth["id"]}}>
    
    <input type="submit" value="更新">
</form>

<form method="POST" action="/user/edit/password">
@csrf

    <a>パスワードを変更</a>
    <br>
    <a>現在のパスワードを入力</a>
    <br>
    <input  type="password" name="CurrentPassword">
    @if ($errors->has('CurrentPassword'))
    <a>{{$errors->first('CurrentPassword')}}</a>
    @endif
    <br>
    <a>新しいパスワードを入力</a>
    <br>
    <input  type="password" name="newPassword">
    <br>
    <a>新しいパスワードを再度入力</a>
    <br>
    <input  type="password"  name="newPassword_confirmation">
    <input type="submit" value="更新">
    <input type="hidden" name="UserId" value={{$auth["id"]}}>
    @if ($errors->has('newPassword'))
    <a>{{$errors->first('newPassword')}}</a>
    @endif
    @if (session('status'))
    {{ session('status') }}
    @endif
</form>

<form method="GET" action="/user/edit/delete">
    <br>
    <button type="submit">退会</button>
</form>

</body>
</html>
