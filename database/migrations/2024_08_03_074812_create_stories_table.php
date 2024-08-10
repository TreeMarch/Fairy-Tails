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
        Schema::create('stories', function (Blueprint $table) {
            $table-> bigInteger("story_id")->autoIncrement();
            $table-> string("account_id");
            $table-> string("title");
            $table-> string("description");
            $table-> string("thumbnails_url");
            $table-> bigInteger("categories_id");
            $table-> bigInteger("lessons_id");
            $table-> bigInteger("size_type_id");
            $table-> bigInteger("age_range_id");
            $table-> bigInteger("background_id");
            $table-> bigInteger("use_coin");
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
        Schema::dropIfExists('stories');
    }
};
