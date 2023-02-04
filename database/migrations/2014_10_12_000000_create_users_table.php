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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('email',70)->nullable();
            $table->string('mobile',12)->unique();
            $table->string('referrer',70)->nullable();
            $table->string('gender',20)->nullable();
            $table->integer('age')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode',10)->nullable();
            $table->date('dob')->nullable();
            $table->string('maritalstatus',25)->nullable();
            $table->string('purpose')->nullable();
            $table->timestamps();
            $table->tinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};