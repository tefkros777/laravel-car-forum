<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Post ID (bigUnsignedInteger)
            $table->timestamps();

            $table->string('title');
            $table->string('description');
            $table->boolean('solved'); // Whether an accepted answer has been found

            $table->unsignedBigInteger('author_id'); // User the post belongs to

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
