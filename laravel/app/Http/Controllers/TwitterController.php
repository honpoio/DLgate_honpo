<?php declare(strict_types=1);

namespace App\Http\Controllers;
use App\TwitterOauthOperation\EndpointChanges;
use App\TwitterOauthOperation\OAuthAndUserInfo;
use App\TwitterOauthOperation\TwitterOperation;

use Illuminate\Http\Request;

class TwitterController extends Controller
{
    protected static $Twitter_Config;

    public function redirect(Request $request,EndpointChanges $EndpointChanges)
    {
        //認可サーバーにアクセス
        $provider = 'twitter';
        return $EndpointChanges->ScopeChange($provider, $request);
    }

    public function Twetter_Follow(Request $request, OAuthAndUserInfo $OAuthAndUserInfo)
    {
        //トークンを使用しリソースサーバーにアクセス
        $this->OAuth_AND_User_Info();
        return $OAuthAndUserInfo->Follow_Operation($request);
    }

    public function TweetRT(Request $request, TwitterOperation $TwitterOperation)
    {
        $this->OAuth_AND_User_Info();
        return $TwitterOperation->RT_Operation($request);
    }

    private function OAuth_AND_User_Info(OAuthAndUserInfo $OAuthAndUserInfo): void
    {
        // Oauthのアクセスキーを取得するメソッド
        self::$Twitter_Config = $OAuthAndUserInfo->Twitter_User_Property();
    }
}
