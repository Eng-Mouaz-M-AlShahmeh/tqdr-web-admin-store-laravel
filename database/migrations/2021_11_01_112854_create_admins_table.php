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
            // $table->unsignedInteger('user_id');
            // ->default($value)
            // ->autoIncrement()
            // $table->integer('quantity');
            $table->string('username', 50);
            $table->string('password', 50);
            $table->rememberToken();
            $table->string('avatar', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->timestamps();
            // $table->foreign('user_id')
            // ->references('id')
            // ->on('users')
            // ->onDelete('cascade');
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
