<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $faker = \Faker\Factory::create();
            DB::table('chat-rooms')->insert([
                'name'=> 'General',
                'created_at'=>$faker->dateTime,
                'updated_at'=>$faker->dateTime
            ]);
        DB::table('chat-rooms')->insert([
            'name'=> 'Tech',
            'created_at'=>$faker->dateTime,
            'updated_at'=>$faker->dateTime
        ]);
        }

}
