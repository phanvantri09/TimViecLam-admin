<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInfoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_user', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('address')->nullable();
            $table->string('numberPhone')->nullable();
            $table->string('birthday')->nullable();
            $table->string('number_cccd')->nullable();
            $table->string('image_avatar')->nullable();
            $table->string('date_create_company')->nullable();
            $table->string('CV')->nullable();
            $table->string('file_certificate')->nullable();
            $table->integer('id_user_create')->nullable();
            $table->integer('id_user_update')->nullable();

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
        Schema::dropIfExists('info_user');
    }
}
