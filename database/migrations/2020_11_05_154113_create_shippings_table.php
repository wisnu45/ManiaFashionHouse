<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('user_name');
            $table->string('company_name');
            $table->string('division');
            $table->string('district');
            $table->string('upozela')->nullable();
            $table->string('union')->nullable();
            $table->string('street_address');
            $table->string('apartment')->nullable();
            $table->string('post_code');
            $table->string('phone');
            $table->string('email');
            $table->string('grandTotal');
            $table->string('transaction_id')->nullable();
            $table->string('cash_on_deliver')->nullable();
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
        Schema::dropIfExists('shippings');
    }
}
