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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('dev_id');
            $table->string('title');
            $table->integer('listing_price');
            $table->integer('dev_price');
            $table->integer('commission');
            $table->longText('description');
            $table->longText('features');
            $table->mediumText('tag');
            $table->string('languages');
            $table->string('file_path');
            $table->date('upload_date');
            $table->integer('total_downloads');
            $table->integer('total_purchase');
            $table->integer('total_view');
            $table->integer('approved_by');
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
        Schema::dropIfExists('projects');
    }
};
