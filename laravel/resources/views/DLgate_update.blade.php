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
                    <div class="card-header">gateの更新</div>
                    <div class="card-body">
                        
                        <div class="form-group row">
                                <label  class="col-md-4 col-form-label text-md-right" autofocus>ゲート名</label>
                                <div class="col-md-6">
                                    <input  type="text" name="gate_name" value="{{$row["gate_name"]}}"　class="form-control @error('gate_name') is-invalid @enderror" placeholder="ゲート名を入力して下さい">
                                    @error('gate_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <br>
                                        <a>例：testGate</a>
                                </div>
                            </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right"> DL_url</label>
                            <div class="col-md-6">
                            <input  type="text" name="dl_url" value="{{$row["dl_url"]}}" class="form-control @error('dl_url') is-invalid @enderror" placeholder="用意したDLリンクを記述して下さい">
                            @error('dl_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                    <br>
                                        <a>例：https://drive.google.com/drive/u/0/folders/〇〇</a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right"> TwitterUserId</label>
                            <div class="col-md-6">
                            <input  type="text" name="Twitter_user" value="{{$row["Twitter_user"]}}" class="form-control @error('Twitter_user') is-invalid @enderror" placeholder="twitterのユーザー名を入力して下さい">
                            @error('Twitter_user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                    <br>
                                        <a>例：MutturiPrin</a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">Tweet Id</label>
                            <div class="col-md-6">
                            <input  type="text" name="tweet_id" value="{{$row["Twitter_tweet"]}}" class="form-control @error('tweet_id') is-invalid @enderror" placeholder="tweetIDを入力して下さい">
                            @error('tweet_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                    <br>
                                        <a>例：1347350017959346177</a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">youtube_channel_id</label>
                            <div class="col-md-6">
                            <input  type="text" name="youtube_channel_id" value="{{$row["youtube_channel_id"]}}" class="form-control @error('Twitter_user') is-invalid @enderror" placeholder="YoutubeChannelIdを入力して下さい">
                            @error('youtube_channel_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                    <br>
                                        <a>例：UCH54kxctdxPdBVr_lbVU9uA</a>
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