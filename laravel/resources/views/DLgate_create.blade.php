<<<<<<< HEAD
<<<<<<< HEAD
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
                                    <input  type="text" name="gate_name" class="form-control @error('gate_name') is-invalid @enderror">
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
                                <input  type="text" name="dl_url" class="form-control @error('dl_url') is-invalid @enderror" >
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
                                <input  type="text" name="Twitter_user" class="form-control @error('Twitter_user') is-invalid @enderror" >
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
                                <input  type="text" name="tweet_id" class="form-control @error('tweet_id') is-invalid @enderror" >
                                @error('tweet_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
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
=======
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>D</title>
</head>
=======
@extends('layouts.app')
@section('content')
>>>>>>> DB_redesign
<body>
<form action="/insert" method="POST">
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
                                    <input  type="text" name="gate_name" class="form-control @error('gate_name') is-invalid @enderror">
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
                                <input  type="text" name="dl_url" class="form-control @error('dl_url') is-invalid @enderror" >
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
                                <input  type="text" name="Twitter_user" class="form-control @error('Twitter_user') is-invalid @enderror" >
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
                                <input  type="text" name="tweet_id" class="form-control @error('tweet_id') is-invalid @enderror" >
                                @error('tweet_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
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
<<<<<<< HEAD
</html>
>>>>>>> test
=======
@endsection
>>>>>>> DB_redesign
