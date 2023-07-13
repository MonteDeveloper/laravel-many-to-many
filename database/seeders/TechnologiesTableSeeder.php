<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = config("technologies");
        
        foreach($technologies as $technology){
            $newTechnology = new Technology();
            $newTechnology->name = $technology["name"];
            $newTechnology->description = $technology["description"];
            $newTechnology->version = $technology["version"];
            $newTechnology->save();
        }
    }
}
