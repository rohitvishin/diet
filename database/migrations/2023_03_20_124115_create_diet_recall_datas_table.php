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
        Schema::create('diet_recall_datas', function (Blueprint $table) {
            $table->id();
            $table->date('diet_recall_date');
            $table->string('client_id');
            $table->text('meal_out')->default('');
            $table->text('water_intake')->default('');
            $table->text('fried_food')->default('');
            $table->text('choclate')->default('');
            $table->text('juices')->default('');
            $table->text('junk_foods')->default('');
            $table->text('bread')->default('');
            $table->text('potato')->default('');
            $table->text('chesse')->default('');
            $table->text('oil')->default('');
            $table->text('ghee')->default('');
            $table->text('alcohol')->default('');
            $table->text('smoking')->default('');
            $table->text('crabs')->default('');
            $table->text('protien')->default('');
            $table->text('milk')->default('');
            $table->text('veg')->default('');
            $table->text('fruits')->default('');
            $table->text('protien_powder')->default('');
            $table->text('nuts')->default('');
            $table->timestamps()
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_recall_datas');
    }
};