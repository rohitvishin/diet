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
        Schema::create('lab_masters', function (Blueprint $table) {
            $table->id();
            $table->string('test_type');
            $table->string('test_name');
            $table->string('subject')->comment('gender,age,0:none');
            $table->string('subject_value')->comment('value of reference')->nullable();
            $table->string('subject_value_action')->comment('0:less than, 1:greater than, 2:between, -1:none')->default(-1)->nullable();
            $table->float('result_low_range');
            $table->float('result_high_range')->comment('if null than check its, >=low_rang');
            $table->string('unit');
            $table->timestamps();
            $table->integer('status')->default(1)->comment('1:active,0:deactive')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_masters');
    }
};