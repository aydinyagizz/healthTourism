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
        Schema::create('diseases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('diseases_category_id')->unsigned(); // unsigned olarak değiştirin
            $table->foreign('diseases_category_id')->references('id')->on('disease_categories')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->longText('image')->nullable();
            $table->longText('content')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('featured')->default(0);
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diseases');
    }
};
