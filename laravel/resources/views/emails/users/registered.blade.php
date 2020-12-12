<html>
    <head>
        <title>登録ありがとうございます</title>
    </head>
    <body>
        ようこそ {{ @user->name }}　さん。
        ログインは<a href="{{ url('/login') }}">こちら</a>からお願いします。
    </body>
</html>