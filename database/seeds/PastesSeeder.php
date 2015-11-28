<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Paste;

class PastesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            Paste::create([
                'title'     => $faker->name,
                'body'      => $faker->paragraph(3),
            ]);
        }
    }
}
