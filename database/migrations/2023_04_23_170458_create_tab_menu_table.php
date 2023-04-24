<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_menu', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->string('title');
            $table->string('content');
            $table->string('tab');
            $table->integer('id_menu');
            $table->integer('type_user')->default(111)->comment("111=>người Tìm việc, 222 => người tuyển dụng");
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
        Schema::dropIfExists('tab_menu');
    }
}
