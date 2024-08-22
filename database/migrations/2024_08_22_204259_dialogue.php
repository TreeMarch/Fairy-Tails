<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('dialogues', function (Blueprint $table) {
        $table->bigIncrements('id')->autoIncrement();
        $table->string("content");//Nội dung này chứa thông tin nội dung hội thoại
        $table->string("chapter_id");//để truy vấn dữ liệu từ bảng chapter sang dialogue xem là cái dialog này thuộc chapter nào, luu ý mỗi dialogue là một bản ghi
        $table -> dateTime("created_at") -> useCurrentOnUpdate();
        $table -> dateTime("updated_at")-> useCurrentOnUpdate();
        $table -> dateTime("deleted_at") -> useCurrentOnUpdate();
        $table -> string("created_by");
        $table -> string("updated_by");
        $table -> string("deleted_by")->nullable();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
