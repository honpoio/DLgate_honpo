<?php
namespace App\Twitter_Oauth_Operation;

use Laravel\Socialite\SocialiteManager;


class EndpointChanges extends SocialiteManager
{
    
    public function Scope_Change($provider,$request){
        if($request->has('Follow')){
            $this->Callback_Change = 'http://localhost:8000/callback';
            // $Twitter_provider = self::driver($provider)->redirect();
            return self::driver($provider)->redirect();
        }

        elseif($request->has('RT')){
            $this->Callback_Change = 'http://localhost:8000/callback2';
            // $Twitter_provider = self::driver($provider)->redirect();
            return self::driver($provider)->redirect();
        }
    }

}