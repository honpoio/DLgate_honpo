<!DOCTYPE html>
<html lang="ja">
<head>
    <title>退会</title>
</head>

<body>
    <a>退会する場合はパスワードを入力し退会ボタンを押下してください</a>
    <br>
</body>

<form method="post" action="/user/edit/Withdrawal">
<input  type="text" name="CurrentPassword">
@csrf
    @if ($errors->has('CurrentPassword'))
    <a>{{$errors->first('CurrentPassword')}}</a>
    @endif
    <br>
    <input type="hidden" name="UserId" value={{$auth["id"]}}>
    
    <input type="submit" value="退会">
</form>


</html>