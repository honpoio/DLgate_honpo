<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
    {
        DB::table('gate_users')->insert([
            [
            'user' =>'test',
            ],
            [
            'user' =>'test2',
            ]
        ]);
        DB::table('users')->insert([
            [
            'name' =>'test',
            'email'=>'test@exmple.com',
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'password'=>bcrypt('testpass'),
            // 'created_at'=>date('Y-m-d H:i:s'),
            // 'update_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'name' =>'test2',
            'email'=>'test2@exmple.com',
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'password'=>bcrypt('testpass'),
            // 'created_at'=>date('Y-m-d H:i:s'),
            // 'update_at'=>date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
