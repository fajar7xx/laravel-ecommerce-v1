<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Admin::create([
            'name' => 'Fajar Siagian',
            'email' => 'fajar7xx@gmail.com',
            'password' => bcrypt('azhari30'),
            'created_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
            'updated_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
        ]);
    }
}
