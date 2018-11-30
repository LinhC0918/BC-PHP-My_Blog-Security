<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Factory;

class PostFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \factory(Post::class, 10)->create();
    }
}
