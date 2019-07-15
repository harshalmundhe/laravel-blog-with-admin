<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("admins")->truncate();
        DB::table("admins")->insert([
                                        'email'=>'admin@laravel.test',
                                        'password'=>bcrypt('admin')
                                ]);
    }
}
