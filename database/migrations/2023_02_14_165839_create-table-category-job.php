<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCategoryJob extends Migration
{
    /**
     * Run the migrations.
     * tất cả các loại ngành nghề như văn phòng, lao động, cntt .....
     * jobs sẽ get theo list category
     * @return void
     */
    public function up()
    {
        Schema::create('category_job', function (Blueprint $table) {
            $table->id();
            $table->integer('id_group_category')->nullable();
            $table->string('name');
            $table->string('content')->nullable();
            $table->integer('amount_search')->default(1)->comment("khi user tìm kiếm hoặc nhấn vào tab này sẽ tự động tăng lên 1");
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
        Schema::dropIfExists('category_job');
    }
}
