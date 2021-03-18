<?php

namespace Database\Seeders;

use App\Models\rating as ModelsRating;
use Illuminate\Database\Seeder;

class rating extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsRating::create([
            "rating"=>4,
            "qusetion_id"=>"1",
            "user_id"=>"1"
        ]);
        ModelsRating::create([
            "rating"=>4,
            "qusetion_id"=>"2",
            "user_id"=>"1"
        ]);
        ModelsRating::create([
            "rating"=>4,
            "qusetion_id"=>"3",
            "user_id"=>"1"
        ]);
        ModelsRating::create([
            "rating"=>4,
            "qusetion_id"=>"4",
            "user_id"=>"1"
        ]);
    }
}
