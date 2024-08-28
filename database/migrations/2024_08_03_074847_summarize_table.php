<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('summarizes', function (Blueprint $table) {
        $table->bigIncrements("id");
        $table->string("story_id");
        $table->longText("title");
        $table->longText("description");
        $table->integer("status");
        $table->string("thumbnail_url");
        $table->timestamp("created_at")->useCurrent(); // Sử dụng timestamp và mặc định hiện tại
        $table->timestamp("updated_at")->useCurrent()->nullable()->onUpdate(DB::raw('CURRENT_TIMESTAMP')); // nullable để tránh lỗi
        $table->timestamp("deleted_at")->nullable(); // Sử dụng nullable cho phép giá trị NULL
        $table->string("created_by");
        $table->string("updated_by");
        $table->string("deleted_by")->nullable();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creted_summarize');
    }
};
