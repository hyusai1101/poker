<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHandRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hand_ranges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('table_type_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('hand_preset_id');
            $table->text('hand_info');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('table_type_id')->references('id')->on('table_types');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('hand_preset_id')->references('id')->on('hand_presets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hand_ranges');
    }
}
