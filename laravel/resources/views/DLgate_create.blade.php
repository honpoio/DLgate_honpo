<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>D</title>
</head>
<body>
@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    
@endif

<form action="/insert" method="POST">
@csrf

    <ul>
        <li>
            <label>
            Twitter_user:
                <input type="text" name="Twitter_user">
            </label>
        </li>
        <li>
            <label>
                tweet id:
                <input  type="text" name="tweet_id">
            </label>
        </li>
        <li>
            <label>
                GATEname:
                <input  type="text" name="gate_name">
            </label>
            <label>
                DL_url:
                <input  type="text" name="dl_url">
            </label>
        </li>
    </ul>

    <input type="submit" value="Add">
</form>
</body>
</html>