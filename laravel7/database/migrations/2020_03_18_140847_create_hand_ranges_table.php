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
            $table->enum('first_hand',['A','2','3','4','5','6','7','8','9','10','J','Q','K']);
            $table->enum('second_hand',['A','2','3','4','5','6','7','8','9','10','J','Q','K']);
            $table->enum('action',['fold','call','raise','re_raise']);
            $table->boolean('suited');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
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
