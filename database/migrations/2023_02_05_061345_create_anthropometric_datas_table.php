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
        Schema::create('anthropometric_datas', function (Blueprint $table) {
            $table->id();
            $table->date('anthro_date');
            $table->string('client_id');
            $table->string('weight');
            $table->string('fat');
            $table->string('body_water');
            $table->string('muscle_mass');
            $table->string('chest');
            $table->string('upper_waist');
            $table->string('hips');
            $table->string('lower_waist');
            $table->string('bmr');
            $table->string('height_cm');
            $table->string('height');
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
        Schema::dropIfExists('anthropometric_datas');
    }
};