<?php

use Illuminate\Database\Seeder;

use Faker\Factory;
use Illuminate\Support\Str;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        DB::table("posts")->truncate();
        
        $posts = [];
        for($i=1;$i<=500;$i++){
            $title = $faker->sentence(rand(4,7),true);
            $posts[] = [
                'user_id'=>rand(1,100),
                'title'=> $title,
                'body'=> $faker->paragraphs(rand(10,15),true),
                'created_at'=> $faker->dateTimeBetween('-10 years','now') ,
                'cover_image'=> "blog_img".rand(1,51).".jpg",
                'excerpt'=> $faker->text(rand(210,215),true),
                'category'=> rand(1,47),
                'likes'=> 0,
                'slug'=> Str::slug($title)
            ];
        }
        DB::table("posts")->insert($posts);
    }
}
