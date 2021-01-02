<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLisencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lisences', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('lisence_number');
            $table->string('lisence_country');
            $table->boolean('automatic');

            $table->unsignedBigInteger('user_id'); // Lisence holder

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lisences');
    }
}
