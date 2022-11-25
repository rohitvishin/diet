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
        Schema::create('order_history', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('dev_id');
            $table->integer('project_id');
            $table->mediumText('pay_details');
            $table->integer('og_amount');
            $table->integer('discount');
            $table->integer('coupon_code');
            $table->integer('paid');
            $table->string('license');
            $table->integer('total_downloads');
            $table->date('expiry_date');
            $table->timestamps();
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_history');
    }
};
