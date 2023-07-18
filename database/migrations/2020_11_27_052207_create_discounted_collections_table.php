<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountedCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounted_collections', function (Blueprint $table) {
            $table->id();
            $table->string('collection_name');
            $table->string('collection_img');
            $table->string('product_id')->nullable();
            $table->unsignedBigInteger('catagory_id')->nullable();
            $table->string('discount_title');
            $table->string('discount');
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
        Schema::dropIfExists('discounted_collections');
    }
}
