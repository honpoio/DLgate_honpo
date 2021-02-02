<?php declare(strict_types=1);

namespace App\Http\Controllers;
use App\TwitterOauthOperation\EndpointChanges;
use App\TwitterOauthOperation\OAuthAndUserInfo;
use App\TwitterOauthOperation\TwitterOperation;

use Illuminate\Http\Request;

class TwitterController extends Controller
{
    protected static $TwitterConfig;

    public function redirect(Request $request,EndpointChanges $EndpointChanges)
    {
        //認可サーバーにアクセス
        $provider = 'twitter';
        return $EndpointChanges->ScopeChange($provider, $request);
    }

    public function TwetterFollow(Request $request, TwitterOperation $TwitterOperation)
    {
        //トークンを使用しリソースサーバーにアクセス
        $this->OAuthAndUserInfo();
        return $TwitterOperation->FollowOperation($request);
    }

    public function TweetRT(Request $request, TwitterOperation $TwitterOperation)
    {
        $this->OAuthAndUserInfo();
        return $TwitterOperation->RTOperation($request);
    }

    private function OAuthAndUserInfo(OAuthAndUserInfo $OAuthAndUserInfo): void
    {
        // Oauthのアクセスキーを取得するメソッド
        self::$TwitterConfig = $OAuthAndUserInfo->TwitterUserProperty();
    }
}
