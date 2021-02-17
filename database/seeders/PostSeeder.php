<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 20; $i++) {
            DB::table('posts')->insert([
                'category_id' => rand(1, 10),
                'title' => 'Post ' . $i,
                'description' => $faker->text(50),
                'text' => $faker->realText(250, 2),
                'slug' => 'post-' . $i,
            ]);
        }
        
    }
}
