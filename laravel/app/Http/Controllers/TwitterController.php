<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth as TwitterOAuth;

class TwitterController extends Controller
{
    protected static $Twitter_Config;
    
    private function OAuth_AND_User_Info(){
    // Oauthのアクセスキーを取得するメソッド
        self::$Twitter_Config = app('User_Info')->Twitter_User_Property();
    }

    public function redirect(Request $request){
        //認可サーバーにアクセス
        $provider = "twitter";
        return app('EndpointChange')->Scope_Change($provider,$request);
    }
    
    public function Twetter_Follow(Request $request)
    {
        //トークンを使用しリソースサーバーにアクセス
        $this->OAuth_AND_User_Info();
        return app('Twitter_Operation')->Follow_Operation($request);
    }
    public function TweetRT(Request $request){
        $this->OAuth_AND_User_Info();   
        return app('Twitter_Operation')->RT_Operation($request);
    }
}
