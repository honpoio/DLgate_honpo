<?php declare(strict_types=1);

namespace App\Twitter_Oauth_Operation;

use App\Http\Controllers\TwitterController;
use Exception;

class Twitter_Operation extends TwitterController
{
    public function Follow_Operation($request)
    {
        //アクセストークンを使用しフォローするメソッド
        $screen_name = $request->session()->get('Twitter_user');

        $User_Info = self::$Twitter_Config->get('users/show', ['screen_name' => $screen_name]);
        //スクリーンネームを取得
        // dd($User_Info);
        try {
            if ($User_Info->errors) {
                return redirect('/DLgate/Form')->with('status', __('ユーザーの取得に失敗しました。作成者にお問い合わせお願いします'));
            }
        } catch (Exception $e) {
            //ユーザー取得に成功した時の処理
            $user_id = $User_Info->id_str;
            //スクリーンネームからユーザーID取得
            self::$Twitter_Config->post('friendships/create', ['user_id' => $user_id]);
            // フォローする

            if (self::$Twitter_Config->getLastHttpCode() == 200) {
                // フォロー成功
                echo "sucsess Follow\n";
                $request->session()->forget('Twitter_user');
                $request->session()->put('Twitter_user_sucsess', true);
                return redirect('/DLgate/Form')->with('status', __('フォロー成功しました'));
            }
            // フォロー失敗
            echo "Follow failed\n";
            return redirect('/DLgate/Form')->with('status', __('フォロー失敗しました'));
        }
    }

    public function RT_Operation($request)
    {
        $tweet = $request->session()->get('Twitter_tweet');
        self::$Twitter_Config->post('statuses/retweet', ['id' => $tweet]);
        //RTする

        self::$Twitter_Config->post('favorites/create', ['id' => $tweet]);
        //いいねする
        if (self::$Twitter_Config->getLastHttpCode() == 200) {
            // リツイート成功

            $request->session()->forget('Twitter_tweet');

            $request->session()->put('Twitter_tweet_sucsess', true);
            return redirect('/DLgate/Form')->with('status', __('RTに成功しました'));
        }
        // リツイート失敗
        echo "RT failed \n";
        return redirect('/DLgate/Form')->with('status_error', __('RTに失敗しました'));
        return redirect('/DLgate/Form');
    }
}
