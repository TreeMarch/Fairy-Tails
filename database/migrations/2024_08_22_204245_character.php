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
      Schema::create('characters', function (Blueprint $table) {
        $table->bigIncrements('id')->autoIncrement();
        $table->string("name");//Nội dung này chứa thông tin nội dung hội thoại
        $table->string("character_id");// bảng này để cho vui
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
