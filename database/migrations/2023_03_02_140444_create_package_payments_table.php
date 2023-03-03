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
        Schema::create('package_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('dev_id');
            $table->integer('user_id');
            $table->integer('appointment_id');
            $table->integer('package_id');
            $table->integer('final_amt');
            $table->string('start_date');
            $table->string('confirmation_date');
            $table->string('payment_method');
            $table->string('transaction_id');
            $table->integer('no_emi');
            $table->string('down_payment');
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
        Schema::dropIfExists('package_payments');
    }
};
