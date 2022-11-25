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
        Schema::create('systemlog', function (Blueprint $table) {
            $table->id();
            $table->integer('user_type')->comment("1=users/ 2=dev / 3=admin");
            $table->integer('user_id');
            $table->string('log');
            $table->date('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systemlog');
    }
};
