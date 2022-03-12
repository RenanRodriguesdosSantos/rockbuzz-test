<?php

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
        
        \App\User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt(123456)
        ]);
        
        factory(\App\Tag::class, 8)->create();

        $this->call(PostSeeder::class);
    }
}
