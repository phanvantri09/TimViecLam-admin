<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
            # code...
            DB::table('category_job')->insert([
                'name' => Str::random(10),
                'content' => Str::random(100),
                'id_user_create'=>rand(1, 20),
            ]);
        }
        
    }
}
