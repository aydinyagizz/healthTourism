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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->tinyInteger('user_role')->comment('0->admin, 1->kullanıcılar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
//            $table->string('company_name')->nullable();
//            $table->string('user_logo')->nullable();
            $table->longText('user_image')->nullable();
            $table->string('web_site_name', 500)->nullable();
            $table->string('slug')->nullable();
            $table->tinyInteger('status')->nullable();
           // $table->tinyText('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('address', 500)->nullable();
            $table->rememberToken();
            $table->timestamps();
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
