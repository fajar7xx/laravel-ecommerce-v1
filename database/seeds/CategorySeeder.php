<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Root',
            'description' => 'This is the root category, dont delete this one',
            'parent_id' => null,
            'menu' => 0,
        ]);

        factory('App\Category', 10)->create();
    }
}
