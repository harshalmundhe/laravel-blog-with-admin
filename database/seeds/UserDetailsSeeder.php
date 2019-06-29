<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory;

class UserDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        
        
        $ins_user = array();
        $ins_user_det = array();
        for($i=2;$i<=100;$i++){
            $fname = $faker->firstName;
            $lname = $faker->lastName;
            $name = $fname." ".$lname;
            $ins_user[] = [
                'id' =>$i,
                'name' => $name,
                'email' => strtolower($fname.".".$lname."@example.com"),
                'password'=> bcrypt($fname)
            ];
            
            $ins_user_det[] = [
                'user_id' =>$i,
                'firstname' => $fname,
                'lastname' => $lname,
                'profession' => $faker->jobTitle,
                'street' => $faker->streetAddress,
                'city' => $faker->city,
                'state' => $faker->state,
                'country' => $faker->state,
                'experience' => $faker->numberBetween(2,10),
                'hourlyrate' => $faker->numberBetween(10,20),
                'totalprojects' => $faker->numberBetween(12,15),
                'description' => $faker->paragraphs(3,true),
                'company' => $faker->company,
            ];
        }
        DB::table("users")->insert($ins_user);
        DB::table("user_details")->insert($ins_user_det);
    }
}
