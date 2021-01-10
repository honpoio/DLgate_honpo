<?php

use Illuminate\Database\Seeder;


class dlgate_tableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dlgate_table')->insert([
        [
            'Twitter_tweet' => '1331201779199950848',
            'user_id' =>'1',
            'dl_url' =>'https://www.google.com',
            'Twitter_user' =>'MutturiPrin',
            'gate_name' =>'test_gate',
            'URL_id' => uniqid(),
            'youtube_channel_id' =>'UCH54kxctdxPdBVr_lbVU9uA',
        ],
        [
            'user_id' => '1',
            'dl_url' =>'https://www.google.com',
            'Twitter_user' => NULL,
            'Twitter_tweet' =>'1331201779199950848',
            'gate_name' =>'test_gate',
            'URL_id' => uniqid(),
            'youtube_channel_id' =>NULL,

        ],

        [
            'user_id' => '1',
            'dl_url' =>'https://www.google.com',
            'Twitter_tweet' =>NULL,
            'Twitter_user' =>'MutturiPrin',
            'gate_name' =>'test_gate',
            'URL_id' => uniqid(),
            'youtube_channel_id' =>NULL,
        ],


        [
            'user_id' => '1',
            'dl_url' =>'https://www.google.com',
            'Twitter_tweet' =>NULL,
            'Twitter_user' => NULL,
            'gate_name' =>'test_gate',
            'URL_id' => uniqid(),
            'youtube_channel_id' =>'UCH54kxctdxPdBVr_lbVU9uA',

        ],

        [
            'user_id' =>'2',
            'dl_url' =>'https://www.google.com',
            'Twitter_user' =>'MutturiPrin',
            'Twitter_tweet' =>'1334835300955131904',
            'gate_name' =>'test_gate',
            'URL_id' => uniqid(),
            'youtube_channel_id' =>'UCH54kxctdxPdBVr_lbVU9uA',
        ],
        [
            'user_id' => '2',
            'dl_url' =>'https://www.google.com',
            'Twitter_user' => NULL,
            'Twitter_tweet' =>'1334835300955131904',
            'gate_name' =>'test_gate',
            'URL_id' => uniqid(),
            'youtube_channel_id' =>NULL,

        ],

        [
            'user_id' => '2',
            'dl_url' =>'https://www.google.com',
            'Twitter_user' =>'MutturiPrin',
            'Twitter_tweet' =>NULL,
            'gate_name' =>'test_gate',
            'URL_id' => uniqid(),
            'youtube_channel_id' =>NULL,
            ]
        ]);
    }
}
