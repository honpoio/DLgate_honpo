@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
=======
            @if (session('status'))
            {{ session('status') }}
            @endif
                <div class="card-header">本登録メールを送信しました</div>
=======
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>
>>>>>>> DB_redesign
=======
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>
>>>>>>> frontend

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
<<<<<<< HEAD
<<<<<<< HEAD
                    @endif -->
                    <form method="POST" action="/email/resend">
                    @csrf
                    @if (session('resent') == true )
                            確認メールを送信しました。（再送信する場合はクリック）<input type="submit" value="再送信"><br>
                            <a>メールが届かない場合はhogehogeまでご連絡お願いします。</a>
                        @else
                        <
                        
                        
                            再送する場合は<input type="submit" value="再送信">をクリックして下さい
                            <!-- <a href="{{ route('verification.resend') }}">再送信</a><br> -->
                        </form>
                        @endif
>>>>>>> test
=======
=======
>>>>>>> frontend
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
<<<<<<< HEAD
>>>>>>> DB_redesign
=======
>>>>>>> frontend
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
