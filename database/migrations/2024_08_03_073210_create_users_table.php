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
        Schema::create('users', function (Blueprint $table) {

//            $table->bigIncrements('id');
//            $table->string('name');
//            $table->string('email')->unique();
//            $table->timestamp('email_verified_at')->nullable();
//            $table->string('password');
//            $table->rememberToken();
//            $table->timestamps();


            $table -> bigInteger("id")->autoIncrement();
            $table -> string("account_id");
            $table -> string("user_name");
            $table -> string("user_password");
            $table -> string("first_name");
            $table -> string("last_name");
            $table -> string("email")->unique();
            $table -> string("phone_number");
            $table ->string('url_avatar')->nullable();
            $table -> string("favourite");
            $table -> date("birth");
            $table -> string("salt");
            $table -> bigInteger("current_coin");
            $table -> boolean("is_admin") -> default(false);
            $table -> integer("status") -> default(1);
            $table->timestamps();
            $table -> dateTime("deleted_at") ->nullable();
            $table -> string("created_by");
            $table -> string("updated_by");
            $table -> string("deleted_by") ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
