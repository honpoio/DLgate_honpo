<?php
namespace App\Twitter_Oauth_Operation;

use Laravel\Socialite\SocialiteManager;


class EndpointChanges extends SocialiteManager
{
    
    public function Scope_Change($provider,$request){
<<<<<<< HEAD
<<<<<<< HEAD
        //コールバックURLを変更するメソッド
        if($request->has('Follow')){
            $this->Callback_Change = 'https://dlgate-jp.cyou/callback/follw';
<<<<<<< HEAD
=======
=======
        //コールバックURLを変更するメソッド
>>>>>>> prepare_deploy
        if($request->has('Follow')){
            $this->Callback_Change = 'http://localhost:8000/callback';
            // $Twitter_provider = self::driver($provider)->redirect();
<<<<<<< HEAD
>>>>>>> test
=======
>>>>>>> frontend
=======
>>>>>>> stagingMaster
            return self::driver($provider)->redirect();
        }

        elseif($request->has('RT')){
<<<<<<< HEAD
<<<<<<< HEAD
            $this->Callback_Change = 'https://dlgate-jp.cyou/callback/RT';
=======
            $this->Callback_Change = 'http://localhost:8000/callback2';
            // $Twitter_provider = self::driver($provider)->redirect();
<<<<<<< HEAD
>>>>>>> test
=======
>>>>>>> frontend
=======
            $this->Callback_Change = 'https://dlgate-jp.cyou/callback/RT';
>>>>>>> stagingMaster
            return self::driver($provider)->redirect();
        }
    }

}