<?php declare(strict_types=1);

use Illuminate\Database\Seeder;

class dlgate_tableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dlgates')->insert([
        [
            'Twitter_tweet' => '1331201779199950848',
            'user_id' => '1',
            'dl_url' => 'https://www.google.com',
            'Twitter_user' => 'MutturiPrin',
            'gate_name' => 'test_gate',
            'URL_id' => uniqid(),
            'youtube_channel_id' => 'UCH54kxctdxPdBVr_lbVU9uA',
        ],
        [
            'user_id' => '1',
            'dl_url' => 'https://www.google.com',
            'Twitter_user' => null,
            'Twitter_tweet' => '1331201779199950848',
            'gate_name' => 'test_gate',
            'URL_id' => uniqid(),
            'youtube_channel_id' => null,
        ],

        [
            'user_id' => '1',
            'dl_url' => 'https://www.google.com',
            'Twitter_tweet' => null,
            'Twitter_user' => 'MutturiPrin',
            'gate_name' => 'test_gate',
            'URL_id' => uniqid(),
            'youtube_channel_id' => null,
        ],

        [
            'user_id' => '1',
            'dl_url' => 'https://www.google.com',
            'Twitter_tweet' => null,
            'Twitter_user' => null,
            'gate_name' => 'test_gate',
            'URL_id' => uniqid(),
            'youtube_channel_id' => 'UCH54kxctdxPdBVr_lbVU9uA',
        ],

        [
            'user_id' => '2',
            'dl_url' => 'https://www.google.com',
            'Twitter_user' => 'MutturiPrin',
            'Twitter_tweet' => '1334835300955131904',
            'gate_name' => 'test_gate',
            'URL_id' => uniqid(),
            'youtube_channel_id' => 'UCH54kxctdxPdBVr_lbVU9uA',
        ],
        [
            'user_id' => '2',
            'dl_url' => 'https://www.google.com',
            'Twitter_user' => null,
            'Twitter_tweet' => '1334835300955131904',
            'gate_name' => 'test_gate',
            'URL_id' => uniqid(),
            'youtube_channel_id' => null,
        ],

        [
            'user_id' => '2',
            'dl_url' => 'https://www.google.com',
            'Twitter_user' => 'MutturiPrin',
            'Twitter_tweet' => null,
            'gate_name' => 'test_gate',
            'URL_id' => uniqid(),
            'youtube_channel_id' => null,
            ],
        ]);
    }
}
