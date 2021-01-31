@extends('layouts.app')
@section('content')
<body>
<form action="/DLgate/insert" method="POST">
@csrf

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">gateを新規作成</div>

                    <div class="card-body">

                            <div class="form-group row">
                                <label  class="col-md-4 col-form-label text-md-right" autofocus>ゲート名</label>
                                <div class="col-md-6">
                                    <input  type="text" name="gate_name" class="form-control @error('gate_name') is-invalid @enderror" placeholder="ゲート名を入力して下さい" value="{{ old('gate_name') }}">
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
                                <input  type="text" name="dl_url" class="form-control @error('dl_url') is-invalid @enderror"  placeholder="用意したDLリンクを記述して下さい" value="{{ old('dl_url') }}">
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
                                <input  type="text" name="Twitter_user" class="form-control @error('Twitter_user') is-invalid @enderror" placeholder="twitterのユーザー名を入力して下さい" value="{{ old('Twitter_user') }}">
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
                                <input  type="text" name="tweet_id" class="form-control @error('tweet_id') is-invalid @enderror" placeholder="tweetIDを入力して下さい" value="{{ old('tweet_id') }}">
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
                                <input  type="text" name="youtube_channel_id" class="form-control @error('youtube_channel_id') is-invalid @enderror" placeholder="YoutubeChannelIdを入力して下さい" value="{{ old('youtube_channel_id') }}">
                                @error('youtube_channel_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                                    <br>
                                        <a>例：UCH54kxctdxPdBVr_lbVU9uA</a>
                                </div>
                                
                            </div>
                        <button dusk="view-button" class="btn btn-primary">add</button>
                    </div>
            </div>
        </div>
    </div>
</div>

</form>
</body>
@endsection