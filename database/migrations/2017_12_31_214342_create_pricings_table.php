<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('day')->nullable();
            $table->integer('start_time')->nullable();
            $table->integer('end_time')->nullable();
            $table->integer('pricePerUnit')->nullable();
            $table->integer('minutesPerUnit')->nullable();
            $table->integer('minutesMinimumStay')->nullable();
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
        Schema::dropIfExists('pricings');
    }
}
