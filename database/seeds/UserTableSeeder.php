<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        DB::table("users")->truncate();
        DB::table("user_details")->truncate();
        DB::table("users")->insert([
            [
            'id'=>1,
            'name'=>'Harshal Test',
            'email'=>'harshal.mundhe@dinerosoftware.com',
            'password'=>bcrypt('123456')
            ]
        ]);
        DB::table("user_details")->insert([
                'user_id'=>1,
                'firstname' => "Harshal",
                'lastname' => "Test",
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
        ]);
    }
}
