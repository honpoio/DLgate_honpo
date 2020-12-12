<?php

// テストを書くそもそもの目的は、
// バグの発見と修正や コードのリファクタリングを開発者がやりやすくすること。 
// そしてテスト対象のソフトウェアのドキュメントとしての役割を果たすことだ。 
// これらの目的を達成するためには、 ユニットテストがプログラム内のすべてのルートをカバーしていることが理想である。 
// ひとつのユニットテストがカバーするのは、 通常はひとつの関数やメソッド内の特定のルートだけとなる。 
// しかし、テストメソッドは必ずしもカプセル化して独立させる必要はない。 
// 複数のテストメソッドの間に暗黙の依存性があって、 隠された実装シナリオがテストの中にあるのもよくあることだ。


namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class twitterOAuthTest extends TestCase
{
    // public function test_OAuth()
    // {
    //      // 認証ページの検証
    //     $response = $this->get(route('twitter_OAuth', ['provider' => 'twitter']));
        
    //     $response->assertStatus(200);
    //     #認証ページへリダイレクトしているか確認
    //     $target = parse_url($response->headers->get('location'));
    //     dd($target['host']);
    //     //認証ページURLのhostの文字列と'api.twitter.com'を確認
    //     $this->assertEquals('api.twitter.com', $target['host']);
    //     $this->assertEquals('/oauth/authenticate', $target['path']);
    //     $this->assertStringContainsString('oauth_token=',$target['query']);
    //      // 文字列に部分文字列が含まれている場合はtrueを返す
    // }
    
    // public function test_twitterFollow(){
    //     $response = $this->get(route('twitter'));
    //     $response->assertStatus(200);
    // }
}
