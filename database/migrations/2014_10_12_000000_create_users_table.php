<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 120)->unique();
            $table->string('name', 120);
            $table->text('permissions')->nullable();
            $table->string('description', 255)->nullable();
            $table->tinyInteger('is_default')->unsigned()->default(0);
            $table->integer('created_by')->unsigned()->references('id')->on('users')->index();
            $table->integer('updated_by')->unsigned()->references('id')->on('users')->index();
            $table->timestamps();
        });

        Schema::create('role_users', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->references('id')->on('users')->index();
            $table->integer('role_id')->unsigned()->references('id')->on('roles')->index();
            $table->nullableTimestamps();
        });

        Schema::create('user_meta', function (Blueprint $table) {
            $table->id();
            $table->string('key')->nullable();
            $table->string('value')->nullable();
            $table->integer('user_id')->unsigned()->references('id')->on('users')->index();
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('activations');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('role_users');
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_meta');
    }
}
