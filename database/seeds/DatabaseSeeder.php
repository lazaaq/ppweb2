<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        User::create([
            'level' => 'admin',
            'name' => "LANA SAIFUL AQIL",
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'level' => 'user',
            'name' => "lana saiful aqil",
            'email' => 'user@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
