<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use trunks07\YoutubeLaravelApi\AuthenticateService;
use trunks07\YoutubeLaravelApi\ChannelService;

class GoogleController extends Controller
{
    public function Subscription(Request $request)
    {
        $code = $request->input('code');
        $authObject = new AuthenticateService;
        $authResponse = $authObject->authChannelWithCode($code);
        $token = $authResponse['token'];
        //アクセストークンを取得

        $properties = ['snippet.resourceId.kind' => 'youtube#channel',
        'snippet.resourceId.channelId' => session()->get('youtube_channel_id'), ];
        //スコープを設定

        $channelServiceObject = new ChannelService;
        $response = $channelServiceObject->addSubscriptions($properties, $token, $part = 'snippet', $params = []);

        if ($response === null) {
            return redirect('/DLgate/Form')->with('status_error', __('登録に失敗しました。'));
        }

        session()->put('youtube_channel_id_sucsess', true);
        session()->forget('youtube_channel_id');

        return redirect('/DLgate/Form')->with('status', __('登録に成功しました'));
    }
}
