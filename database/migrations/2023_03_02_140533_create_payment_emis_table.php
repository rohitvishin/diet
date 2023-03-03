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
        Schema::create('payment_emis', function (Blueprint $table) {
            $table->id();
            $table->integer('pay_id');
            $table->integer('dev_id');
            $table->integer('user_id');
            $table->integer('appointment_id');
            $table->integer('emi_amt');
            $table->string('emi_date');
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
        Schema::dropIfExists('payment_emis');
    }
};
