<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('name', 120);
            $table->string('slug', 120)->unique()->nullable();
            $table->string('status', 60)->default('published');
            $table->string('title', 120)->nullable();
            $table->integer('reference_id')->length(10)->default(0)->index();
            $table->string('reference_type', 120)->nullable();
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
        Schema::dropIfExists('tags');
    }
}
