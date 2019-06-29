<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class LikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        DB::table("user_likes")->truncate();
        
        $user_likes = [];
        for($i=1;$i<=3000;$i++){
            $user_likes[] = [
                'post_id' => rand(1,500),
                'ip' => $faker->ipv4,
                'created_at'=> $faker->dateTimeBetween('-8 years','now') ,
            ];
        }
        DB::table("user_likes")->insert($user_likes);
    }
}
