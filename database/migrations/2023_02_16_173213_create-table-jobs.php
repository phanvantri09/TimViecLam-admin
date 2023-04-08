<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_category_job')->nullable();
            $table->integer('price_start')->nullable();
            $table->integer('price_end')->nullable();
            $table->integer('amount')->nullable()->comment('số lượng tuyển');
            $table->string('time_start');
            $table->string('time_end');
            $table->string('image')->nullable();
            $table->string('content')->nullable();
            $table->integer('status')->default(1)->comment('1 => vừa tạo, 2 => được admin duyệt, 3 => admin không chấp nhận, 4 => gửi lại cho admin duyệt lần nữa');
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
        Schema::dropIfExists('jobs');
    }
}
