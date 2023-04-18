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
            $table->id()->unsigned();
            $table->string('name', 120);
            $table->string('slug', 120)->unique()->nullable();
            $table->string('status', 60)->default('published');
            $table->string('title', 120)->nullable();
            $table->text('content')->nullable();
            $table->string('image', 120)->nullable();
            $table->string('target', 20)->default('_self');
            $table->integer('reference_id')->length(10)->default(0)->index();
            $table->string('reference_type', 120)->nullable();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->integer('posts_id')->unsigned()->index()->references('id')->on('posts');
            $table->integer('menu_id')->unsigned()->index();
            $table->timestamps();
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
        Schema::dropIfExists('categories');

    }
}
