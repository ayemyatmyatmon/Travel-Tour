<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus__schedules', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->bigInteger('bus_operator_id');
            $table->bigInteger('from_city_id');
            $table->bigInteger('to_city_id');
            $table->bigInteger('level_id');
            $table->bigInteger('bus_type_id');
            $table->bigInteger('day_id');
            $table->decimal('local_price', 20, 2)->default(0);
            $table->decimal('foreign_price', 20, 2)->default(0);
            $table->timestamp('departure_time')->nullable();
            $table->timestamp('arrival_time')->nullable();
            $table->string('duration')->nullable();
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
        Schema::dropIfExists('bus__schedules');
    }
}
