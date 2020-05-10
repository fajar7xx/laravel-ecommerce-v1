<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_attributes', function(Blueprint $table){
            $table->unsignedBigInteger('attribute_id')->after('id');
            $table->string('value')->after('attribute_id');

            $table->foreign('attribute_id')->references('id')->on('attributes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('products_attributes', function(Blueprint $table){
            $table->dropColumn('value');
        });
    }
}
