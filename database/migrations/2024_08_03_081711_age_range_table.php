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
        Schema::create('age_range', function (Blueprint $table) {
          $table -> bigInteger("id") -> autoIncrement();
          $table -> string("age_type");
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
        Schema::dropIfExists('age_range');
    }
};
