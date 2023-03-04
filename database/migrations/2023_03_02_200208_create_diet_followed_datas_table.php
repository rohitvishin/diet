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
        Schema::create('diet_followed_datas', function (Blueprint $table) {
            $table->id();
            $table->date('diet_followed_date');
            $table->string('client_id');
            $table->string('diet_followed_type');
            $table->text('vitamins')->nullable();
            $table->text('general_health')->nullable();
            $table->text('reports')->nullable();
            $table->text('met_dr')->nullable();
            $table->text('food_plan')->nullable();
            $table->text('meal_timing')->nullable();
            $table->text('portion_control')->nullable();
            $table->text('carbs')->nullable();
            $table->text('protiens')->nullable();
            $table->text('fried')->nullable();
            $table->text('desserts')->nullable();
            $table->text('other_cheatings')->nullable();
            $table->text('meal_out')->nullable();
            $table->text('alchol')->nullable();
            $table->text('travel')->nullable();
            $table->text('diet_plan_percentage')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('diet_followed_datas');
    }
};