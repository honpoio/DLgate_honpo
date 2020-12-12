<?php
namespace App\Twitter_Oauth_Operation;

use Laravel\Socialite\SocialiteManager;


class EndpointChanges extends SocialiteManager
{
    
    public function Scope_Change($provider,$request){
        if($request->has('Follow')){
            $this->Callback_Change = 'http://localhost:8000/callback';
            $Twitter_provider = self::driver($provider)->redirect();

            // $_Twitter_provider = $Twitter_provider->headers->headers["location"][0];
                    // laravel/vendor/symfony/http-foundation/HeaderBag.phpに格納されている
                    //　headersプロパティを参照するために__getメソッドを追加
            // return  view('testDLgate',[ 'Twitter_provider' => $_Twitter_provider]);
            return self::driver($provider)->redirect();
        }
        elseif($request->has('RT')){
            $this->Callback_Change = 'http://localhost:8000/callback2';
            $Twitter_provider = self::driver($provider)->redirect();
            // $_Twitter_provider = $Twitter_provider->headers->headers["location"][0];
            // return  self::driver($provider)->redirect();
            // return  view('testDLgate',[ 'Twitter_provider' => $_Twitter_provider]);
            return self::driver($provider)->redirect();
        }
    }

}