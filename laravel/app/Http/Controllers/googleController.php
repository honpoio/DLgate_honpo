<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use trunks07\YoutubeLaravelApi\AuthenticateService;
use  trunks07\YoutubeLaravelApi\ChannelService;
class googleController extends Controller
{   
    public function redirect(){
        
        $authObject  = new AuthenticateService;

        # Replace the identifier with a unqiue identifier for account or channel
        $authUrl = $authObject->getLoginUrl('email','identifier'); 
        

    return view('test',compact('authUrl'));
    
    }

    public function subscription(Request $request){
        // dd($request);
        $code = $request->input('code');
        // dd($code);
        $authObject  = new AuthenticateService;
        $authResponse = $authObject->authChannelWithCode($code);

        $properties =  array('snippet.resourceId.kind' => 'youtube#channel',
        'snippet.resourceId.channelId' => 'UCH54kxctdxPdBVr_lbVU9uA');
        $token = $authResponse["token"];
        $channelServiceObject  = new ChannelService;
        $response = $channelServiceObject->addSubscriptions($properties, $token, $part='snippet', $params=[]);
        dd($response);
    }
}