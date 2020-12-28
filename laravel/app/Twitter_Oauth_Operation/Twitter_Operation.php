<?php
namespace App\Twitter_Oauth_Operation;
use Illuminate\Http\Request;

use App\Http\Controllers\TwitterController;


class Twitter_Operation extends TwitterController
{

    public function Follow_Operation($request){
        $screen_name = $request->session()->get('Twitter_user');
        $User_Info =self::$Twitter_Config->get('users/show', ['screen_name'=> $screen_name]);

        if($User_Info->errors){
            return redirect('/DLgate/form')->with('status', __('ユーザーの取得に失敗しました。作成者にお問い合わせお願いします'));
        }
        $user_id=$User_Info->id_str;
        //ユーザー情報からスクリーンネーム取得
        self::$Twitter_Config->post('friendships/create', ['user_id'=> $user_id]);
        // フォローする
        
        if(self::$Twitter_Config->getLastHttpCode() == 200) {
            // フォロー成功
            print "sucsess Follow\n";
            $request->session()->forget('Twitter_user');
            $request->session()->put('Twitter_user_sucsess',true);
            return redirect('/DLgate/form')->with('status', __('フォロー成功しました'));
        } else {
            // フォロー失敗
            print "Follow failed\n";
            return redirect('/DLgate/form')->with('status', __('フォロー失敗しました'));
        }
        
    }
    public function RT_Operation($request){
        $tweet = $request->session()->get('Twitter_tweet');
        self::$Twitter_Config->post('statuses/retweet',['id' => $tweet]);
        //RTする
        self::$Twitter_Config->post('favorites/create', ['id' => $tweet]);
        //いいねする
        if(self::$Twitter_Config->getLastHttpCode() == 200) {
            // リツイート成功
            
            $request->session()->forget('Twitter_tweet');

            $request->session()->put('Twitter_tweet_sucsess',true);
            return redirect('/DLgate/form')->with('status', __('RTに成功しました'));
        } else {
            // リツイート失敗
            print "RT failed \n";
            return redirect('/DLgate/form')->with('status_error', __('RTに失敗しました'));

        }
        return redirect('/DLgate/form');
    }

}
