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
        Schema::dropIfExists('villages');
        Schema::create('villages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subdistrict_id');
            $table->string('name', 50);
            $table->string('post_code', 50);
            $table->timestamps();
            $table->foreign('subdistrict_id')->references('id')->on('subdistricts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villages');
    }
};
