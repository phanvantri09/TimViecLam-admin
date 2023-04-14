<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeywordSensitiveTableSeeder extends Seeder
{
    public function run()
    {
        $keywords = [
            'sex',
            'ấu dâm',
            'mất dạy',
            'coẹt',
        ];

        foreach ($keywords as $keyword) {
            DB::table('keyword_sensitive')->insert([
                'name' => $keyword,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
