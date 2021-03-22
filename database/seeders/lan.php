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
            "title"=>"Html"
        ]);
        language::create([
            "title"=>"javascript"
        ]);
        language::create([
            "title"=>"css"
        ]);
        language::create([
            "title"=>"bootstrap"
        ]);
        language::create([
            "title"=>"php"
        ]);
        language::create([
            "title"=>"node"
        ]);
        language::create([
            "title"=>"Ruby"
        ]);
        language::create([
            "title"=>"Python"
        ]);
        language::create([
            "title"=>"Swift"
        ]);
        language::create([
            "title"=>"C#"
        ]);
        language::create([
            "title"=>"Java"
        ]);
        language::create([
            "title"=>"Asp.net"
        ]);
        language::create([
            "title"=>"sql"
        ]);
        language::create([
            "title"=>"laravel"
        ]);
        language::create([
            "title"=>"express"
        ]);
        language::create([
            "title"=>"vue.js"
        ]);
        language::create([
            "title"=>"React.js"
        ]);
    }
}
