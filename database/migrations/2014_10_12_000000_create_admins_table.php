<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('email' ,199)->unique();
            $table->string('name' ,199)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password' ,199);
            $table->rememberToken()->nullable();
            $table->timestamps();
            $table->time('last_login')->timestamps()->nullable();
            $table->string('last_name' ,199)->nullable();
            $table->string('avarta_id')->nullable();
            $table->tinyInteger('super_user')->nullable();
            $table->tinyInteger('manage_supers')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');

    }
}
