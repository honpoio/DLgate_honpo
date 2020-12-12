@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if (session('status'))
            {{ session('status') }}
            @endif
                <div class="card-header">本登録メールを送信しました</div>

                <div class="card-body">
                    <!-- @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            メールが送信されました。
                        </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
