<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth as TwitterOAuth;

class TwitterController extends Controller
{
    protected static $Twitter_Config;
<<<<<<< HEAD
<<<<<<< HEAD
    
    private function OAuth_AND_User_Info(){
    // Oauthのアクセスキーを取得するメソッド
        self::$Twitter_Config = app('User_Info')->Twitter_User_Property();
    }

    public function redirect(Request $request){
        //認可サーバーにアクセス
        $provider = "twitter";
=======
=======
    
>>>>>>> DB_redesign
    private function OAuth_AND_User_Info(){
         
        self::$Twitter_Config = app('User_Info')->Twitter_User_Property();
    }

    public function redirect(Request $request){
        
        $provider = "twitter";
<<<<<<< HEAD
        
>>>>>>> test
=======
>>>>>>> DB_redesign
        return app('EndpointChange')->Scope_Change($provider,$request);
    }
    
    public function Twetter_Follow(Request $request)
    {
<<<<<<< HEAD
        //トークンを使用しリソースサーバーにアクセス
=======
>>>>>>> test
        $this->OAuth_AND_User_Info();
        return app('Twitter_Operation')->Follow_Operation($request);
    }
    public function TweetRT(Request $request){
<<<<<<< HEAD
<<<<<<< HEAD
        $this->OAuth_AND_User_Info();   
        return app('Twitter_Operation')->RT_Operation($request);
=======
        $this->OAuth_AND_User_Info();
        $Twitter_Operation = app('Twitter_Operation');
        // $tweet ='1316919356983595009';    
        return $Twitter_Operation->RT_Operation($request);
>>>>>>> test
=======
        $this->OAuth_AND_User_Info();   
        return app('Twitter_Operation')->RT_Operation($request);
>>>>>>> DB_redesign
    }
}
