<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i <10 ; $i++) { 
            DB::table('jobs')->insert([
                'id_user' => 1,
                'id_category_job' => 2,
                'price_start' => rand(1,10)*1000000,
                'price_end' => rand(1,10)*1000000,
                'amount' =>rand(1,100),
                'time_start' => '2023-02-27',
                'time_end' => '2023-03-06',
                'content' => Str::random(100),
                'id_user_create' =>5,
                'title' => "title: ".Str::random(20),
                'status' =>  rand(1,3),
            ]);
        }
        
    }
}
