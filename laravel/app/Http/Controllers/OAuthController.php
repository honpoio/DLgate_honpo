<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator, Redirect, Response, File;
// Validator =>主にユーザーの入力情報が正しいかどうかを確かめる処理・機能
// Redirect =>画面を遷移する機能
use Socialite;
// パッケージを参照
use App\twitter_user;
  //twitter_user　Modelを参照

class OAuthController extends Controller
{  
    public function redirect($provider){
      #redirect == Twitterの認証画面に遷移させる。
      return Socialite::driver($provider)->redirect();
    }
    
    public function callback()
    // twitterでコールバックに設定したURLに移動,ユーザー情報がくっついてくるのでDBに登録する。
    {
        $info = Socialite::driver('twitter')->user();
        //Facadeクラスを継承したsocaialiteクラスからクラス変数のuserの値を変数に代入
        $user = twitter_user::where('twitter_id', $info->id)->first();
        //modelクラスからsql文実行
        //first =>結果データの最初の1件のみを取得します。結果が何件であっても、1件のみを取得します。
        if (!$user) {
        $user = twitter_user::create([
            'twitter_id' => $info->id,
            'twitter_name' => $info->name,
            'twitter_nickname' => $info->nickname,
            'twitter_description' => $info->user['description'],
            'twitter_icon_url' => $info->avatar,
            'twitter_token' => $info->token,
            'twitter_token_secret' => $info->tokenSecret,
        ]);
        }
    
        auth()->login($user);
    //////////////////////////////////////////////////////////////
    

        /*
          テスト出力用
        */
        //  echo '<pre>' . var_export($info, true) . '</pre>';
        //  return view('home');
        // return redirect()->to('/home');
        
      }
}
