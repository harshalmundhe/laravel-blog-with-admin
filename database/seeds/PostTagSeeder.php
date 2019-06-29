<?php

use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("post_tags")->truncate();
        
        $post_tags = [];
        for($i=1;$i<=500;$i++){
            
            for($j=1;$j<rand(5,8);$j++){
                $post_tags[] = [
                    'post_id' => $i,
                    'tag_id' => rand(1,1000)
                ];
            }
            
        }
        DB::table("post_tags")->insert($post_tags);
    }
}
