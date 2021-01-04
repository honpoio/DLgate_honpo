<<<<<<< HEAD
@extends('layouts.app')
@section('content')
<body>
    @foreach($dlgate_table as $row)
    <form method="POST" action="/DLgate/update/add">
    @csrf
    @method('PUT')
    <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">gateを新規作成</div>
                    <div class="card-body">
                        
                        <div class="form-group row">
                                <label  class="col-md-4 col-form-label text-md-right" autofocus>ゲート名</label>
                                <div class="col-md-6">
                                    <input  type="text" name="gate_name" value="{{$row["gate_name"]}}"　class="form-control @error('gate_name') is-invalid @enderror">
                                    @error('gate_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right"> DL_url</label>
                            <div class="col-md-6">
                            <input  type="text" name="dl_url" value="{{$row["dl_url"]}}" class="form-control @error('dl_url') is-invalid @enderror" >
                            @error('dl_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right"> TwitterUserId</label>
                            <div class="col-md-6">
                            <input  type="text" name="Twitter_user" value="{{$row["Twitter_user"]}}" class="form-control @error('Twitter_user') is-invalid @enderror" >
                            @error('Twitter_user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">Tweet Id</label>
                            <div class="col-md-6">
                            <input  type="text" name="tweet_id" value="{{$row["Twitter_tweet"]}}" class="form-control @error('tweet_id') is-invalid @enderror" >
                            @error('tweet_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            </div>
                        </div>
                        <input type="hidden" name="URL_id" value={{$row["URL_id"]}}>
                            <button dusk="view-button" class="btn btn-primary">更新</button>
                        </input>
                    </div>    
                </div>
            </div>
    </div>
    @endforeach
    
    

    </form>
</body>

@endsection
=======
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
>>>>>>> test
