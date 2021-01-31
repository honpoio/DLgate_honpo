<?php declare(strict_types=1);

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
            'name' => 'test',
            'email' => 'test@exmple.com',
            'email_verified_at' => '2020-12-09 14:40:35',
            'password' => bcrypt('testpass'),
            // 'created_at'=>date('Y-m-d H:i:s'),
            // 'update_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'name' => 'test2',
            'email' => 'test2@exmple.com',
            'email_verified_at' => '2020-12-09 14:40:35',
            'password' => bcrypt('testpass'),
            // 'created_at'=>date('Y-m-d H:i:s'),
            // 'update_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
