<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parking_lot_id')->nullable();
            $table->integer('pricing_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('space_number')->nullable();
            $table->string('plate_number')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamp('effective_date')->nullable();
            $table->timestamp('expiry_date')->nullable();
            $table->timestamps();
            //$table->primary(['facilities_manager_id','customer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spaces');
    }
}
