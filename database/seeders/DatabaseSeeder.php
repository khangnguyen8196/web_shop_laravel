<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

       $faker = Faker::create();
       foreach (range(1,200) as $skey => $value){
        DB::table('blogs')
        ->insert([
            'title'=>$faker->text,
            'slug'=> $faker->slug,
            'keywords'=>$faker->text,
            'description'=>$faker->text,
            'content'=>$faker->paragraph,
        ]);
       }
    }
}
