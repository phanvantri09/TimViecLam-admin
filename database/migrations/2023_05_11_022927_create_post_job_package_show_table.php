<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostJobPackageShowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_job_package_show', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name');
            $table->text('content');
            $table->integer('time'); // ví dụ như hoạt thời gian hoạt động là 60 ngày
            $table->string('code')->unique(); //mã code
            $table->string('price');  // số tiền bỏ ra cho gói này
            $table->string('amount'); // số lượng bài post hiển thị
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
        Schema::dropIfExists('post_job_package_show');
    }
}
