<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Post::class, 50)->create();

        for($p=50; $p > 1; $p--) {
            $post = \App\Post::find($p);
            $post->tags()->attach(\App\Tag::all('id')->pluck('id')->random());
        }
    }
}
