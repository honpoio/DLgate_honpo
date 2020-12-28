<?php
namespace App\Twitter_Oauth_Operation;

use Laravel\Socialite\SocialiteManager;

use Abraham\TwitterOAuth\TwitterOAuth as TwitterOAuth;

class OAuth_AND_User_Info extends SocialiteManager
{
    public function Twitter_User_Property(){
        // Oauthのアクセスキーを取得
        $info = self::driver('twitter')->user(); 
        $accessToken = $info->token;
        $accessTokenSecret =  $info->tokenSecret;
        // Jsonからデータを取得しインスタンス変数に代入
        $consumerKey = config('services.twitter.client_id');
        $consumerSecret  = config('services.twitter.client_secret');
        // config/services.phpの連想配列twitterからAPIキー取得
        $Twitter_Config = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

        return $Twitter_Config;
    }
}