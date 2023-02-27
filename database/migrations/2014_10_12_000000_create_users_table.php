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
            $table->string('profession');
            $table->string('working_hours');
            $table->string('social_media');
            $table->string('referrer',70);
            $table->string('gender',20);
            $table->integer('age');
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->string('pincode',10);
            $table->date('dob');
            $table->string('maritalstatus',25);
            $table->string('purpose');
            $table->string('purpose_other')->nullable();
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