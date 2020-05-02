<?php

use Illuminate\Database\Seeder;
use App\Attribute;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create size attribute
        Attribute::create([
            'code' => 'size',
            'name' => 'Size',
            'frontend_type' => 'select',
            'is_filterable' => 1,
            'is_required' => 1,
        ]);

        // crate color attribute
        Attribute::create([
            'code' => 'color',
            'name' => 'Color',
            'frontend_type' => 'select',
            'is_filterable' => 1,
            'is_required' => 1,
        ]);
    }
}
