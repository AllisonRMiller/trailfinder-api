<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrailTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trail_trips', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('trail_id');
            $table->unsignedBigInteger('trip_id');

            $table->foreign('trail_id')
            ->references('id')
            ->on('trails');

            $table->foreign('trip_id')
            ->references('id')
            ->on('trips');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trail_trips');
    }
}
