<?php
require "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth as TwitterOAuth;

$consumerKey       = "your consumer key";
$consumerSecret    = "your consumer secret";
$accessToken       = "your access token";
$accessTokenSecret = "your access token secret";

$twitter = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);