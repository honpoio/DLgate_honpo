<?php declare(strict_types=1);

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(usersTableSeeder::class);
        $this->call(DlgatesTableSeeder::class);
    }
}
