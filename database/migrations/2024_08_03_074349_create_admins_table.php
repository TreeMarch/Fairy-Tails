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
        Schema::create('admins', function (Blueprint $table) {
            $table -> bigInteger("id")->autoIncrement();
            $table -> string("admin_name");
            $table -> string("admin_password");
            $table -> string("first_name");
            $table -> string("last_name");
            $table -> string("email");
            $table -> string("phone");
            $table ->string('url_avatar')->nullable();
            $table -> date("birth");
            $table -> string("salt");
            $table -> boolean("is_admin");
            $table -> integer("status");
            $table -> timestamps();
            $table -> dateTime("deleted_at") ->nullable() ;
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
        Schema::dropIfExists('admins');
    }
};
