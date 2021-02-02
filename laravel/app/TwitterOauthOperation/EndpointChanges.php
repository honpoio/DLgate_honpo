<?php declare(strict_types=1);

namespace App\TwitterOauthOperation;

use Laravel\Socialite\SocialiteManager;

class EndpointChanges extends SocialiteManager
{
    public function ScopeChange($provider, $request)
    {
        //コールバックURLを変更するメソッド
        if ($request->has('Follow')) {
            $this->Callback_Change = 'https://dlgate-jp.cyou/callback/follw';
            return self::driver($provider)->redirect();
        } elseif ($request->has('RT')) {
            $this->Callback_Change = 'https://dlgate-jp.cyou/callback/RT';
            return self::driver($provider)->redirect();
        }
    }
}
