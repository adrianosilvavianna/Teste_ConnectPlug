<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryHasProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_prod_att', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('invetory_id');
            $table->foreign('invetory_id')->references('id')->on('inventories');

            $table->unsignedInteger('prod_att_id');
            $table->foreign('prod_att_id')->references('id')->on('product_has_attributes');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_has_product_attributes');
    }
}
