<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_datas', function (Blueprint $table) {
            $table->id();
            $table->date('exercise_date');
            $table->string('client_id');
            $table->string('exercise_name');
            $table->string('exercise_unit');
            $table->string('exercise_duration');
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
        Schema::dropIfExists('exercise_datas');
    }
};