<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\language;
use Illuminate\Support\Str;
class lan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        language::create([
            "title"=>"php"
        ]);
        language::create([
            "title"=>"node"
        ]);
        language::create([
            "title"=>"java"
        ]);
        language::create([
            "title"=>"laravel"
        ]);
        language::create([
            "title"=>"javescript"
        ]);
        language::create([
            "title"=>"kotlen"
        ]);
        language::create([
            "title"=>"c"
        ]);
    }
}
