<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 100; $i++) {
            $img=$faker->image();

            DB::table('ads')->insert([
                'title'=> $faker->word,
            'description' => $faker->text,
            'picture' => 'default.png',
            'price' => $faker->numberBetween(1,1000),
            'user_id' =>$faker->numberBetween(4,13),
            'category_id' => $faker->numberBetween(1,12),
            ]);

        }

    }
}
