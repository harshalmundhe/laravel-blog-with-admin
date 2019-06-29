<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\User;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        
        DB::table("comments")->truncate();
        $faker = Factory::create();
        
        $comments = [];
        $j = 0;
        for($i=5;$i<=2000;$i++){
            
            $num = rand(1,100);
            
            
            $comments[] = [
                'post_id' => rand(1,500),
                'body'=> $faker->paragraphs(rand(1,3),true),
                'parent_id'=> (rand(1,$i)%$i/2==0)?$i:null,
                'user_id'=>$num,
                'approved'=>$faker->biasedNumberBetween(0,1),
                'created_at'=> $faker->dateTimeBetween('-8 years','now') ,
            ];
        }
        DB::table("comments")->insert($comments);
    }
}
