<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_YouTube;
use Google_Service_YouTube_ResourceId;
use Google_Service_YouTube_SubscriptionSnippet;
use Google_Service_YouTube_Subscription;
class googleController extends Controller
{
    public function index(){
        // ddd(config('app.Google_OAUTH2_CLIENT_ID'));
        session_start();

        $client = new Google_Client();
        $client->setClientId(config('app.Google_OAUTH2_CLIENT_ID'));
        $client->setClientSecret(config('app.GoogleOAUTH2_CLIENT_SECRET'));
        $client->setScopes('https://www.googleapis.com/auth/youtube');
        $redirect = filter_var('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'],
        FILTER_SANITIZE_URL);
        $client->setRedirectUri($redirect);
        //すべてのAPIリクエストを行うために使用されるオブジェクトを定義します。
        
        $youtube = new Google_Service_YouTube($client);

        //必要なスコープの認証トークンが存在するかどうかを確認します
        $tokenSessionKey = 'token-' . $client->prepareScopes();
        if (isset($_GET['code'])) {
        if (strval($_SESSION['state']) !== strval($_GET['state'])) {
            die('The session state did not match.');
        }

        $client->authenticate($_GET['code']);
        $_SESSION[$tokenSessionKey] = $client->getAccessToken();
        header('Location: ' . $redirect);
        }

        if (isset($_SESSION[$tokenSessionKey])) {
        $client->setAccessToken($_SESSION[$tokenSessionKey]);
}


        
        return view('test',compact('authUrl'));
    }
}
