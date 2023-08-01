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
        Schema::create('frontend_offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('disease_id');
            $table->bigInteger('diseases_category_id')->unsigned(); // unsigned olarak değiştirin
            $table->unsignedBigInteger('service_city');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
           // $table->string('date_range')->nullable();
            $table->date('date_range_start')->nullable();
            $table->date('date_range_end')->nullable();
            $table->string('status')->default('unprocessed')->comment('"unprocessed" (İşleme alınmadı) "approved" (Onay) "rejected" (Red) "under_review" (Görüşülüyor)');
            $table->timestamps();

            $table->foreign('disease_id')->references('id')->on('diseases')->onDelete('cascade');
            $table->foreign('service_city')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('diseases_category_id')->references('id')->on('disease_categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frontend_offers');
    }
};
