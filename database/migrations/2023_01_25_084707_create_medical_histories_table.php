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
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('chronic_diseases')->nullable();
            $table->string('bone_health')->nullable();
            $table->string('gastro_instestinal')->nullable();
            $table->string('others')->nullable();
            $table->longtext('medical_prob')->nullable();
            $table->longtext('food_allergy')->nullable();
            $table->longtext('hopitalised')->nullable();
            $table->longtext('past_surgery')->nullable();
            $table->longtext('father_side')->nullable();
            $table->longtext('mother_side')->nullable();
            $table->longtext('cold_cough_flu')->nullable();
            $table->longtext('family_doc_details')->nullable();
            $table->longtext('delivery_yrs')->nullable();
            $table->longtext('periods_timeline')->nullable();
            $table->longtext('periods_symtoms')->nullable();
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
        Schema::dropIfExists('medical_histories');
    }
};