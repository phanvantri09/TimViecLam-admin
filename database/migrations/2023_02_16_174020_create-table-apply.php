<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableApply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_jobs');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('numberPhone')->nullable();
            $table->string('birthday')->nullable();
            $table->string('email')->nullable();
            $table->string('content')->nullable();
            $table->integer('status')->default(1)->comment('1 => vừa tạo đợi duyệt, 2=> tuyển dụng đã xem và chấp nhận CV, 3 => bị loại ');
            $table->string('CV')->nullable();
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
        Schema::dropIfExists('apply');
    }
}
