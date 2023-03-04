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
        Schema::create('diet_chart_datas', function (Blueprint $table) {
            $table->id();
            $table->date('diet_chart_date');
            $table->string('client_id');
            $table->string('plan_name');
            $table->string('plan_intro');
            $table->integer('template_id')->default(0);
            $table->longText('diet_chart');
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
        Schema::dropIfExists('diet_chart_datas');
    }
};