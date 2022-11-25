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
        Schema::create('dev_transaction', function (Blueprint $table) {
            $table->id();
            $table->integer('dev_id');
            $table->mediumText('credit_amt');
            $table->mediumText('debit_amt');
            $table->date('description');
            $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dev_transaction');
    }
};
