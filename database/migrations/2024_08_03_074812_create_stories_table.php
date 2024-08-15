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
            $table-> bigInteger("id")->autoIncrement();
            $table-> string("account_id");
            $table-> string("story_id");
            $table-> string("title");
            $table-> string("description");
            $table-> string("thumbnails_url");
            $table -> dateTime("created_at") -> useCurrentOnUpdate();
            $table -> dateTime("updated_at")-> useCurrentOnUpdate();
            $table -> dateTime("deleted_at") -> useCurrentOnUpdate();
            $table -> string("created_by");
            $table -> string("updated_by");

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
