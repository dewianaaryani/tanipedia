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
        Schema::dropIfExists('farms');
        Schema::create('farms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('name', 50);
            $table->decimal('lt', 10, 7);  // Latitude
            $table->decimal('ld', 10, 7); 
            $table->string('location', 50)->nullable();
            $table->integer('luas');
            $table->string('kualitas_air', 50);
            $table->string('kualitas_udara', 50);
            $table->string('kualitas_tanah', 50);
            $table->string('contact', 50);
            $table->string('image', 50)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farms');
    }
};
