<?php

use Illuminate\Database\Seeder;
use App\AttributeValue;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
            'small',
            'medium',
            'large'
        ];
        $colors = [
            'black',
            'red',
            'blue',
            'orange'
        ];

        foreach($sizes as $size){
            AttributeValue::create([
                'attribute_id' => 1,
                'value' => $size,
                'price' => null,
            ]);
        }

        foreach($colors as $color){
            AttributeValue::create([
                'attribute_id' => 2,
                'value' => $color,
                'price' => null,
            ]);
        }
    }
}
