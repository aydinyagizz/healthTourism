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
        Schema::create('user_offer_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('frontend_offer_id');
            $table->unsignedBigInteger('user_id');
           // $table->enum('status', ['unprocessed', 'under_review', 'approved', 'rejected']);
            $table->string('status')->default('unprocessed')->comment('"unprocessed" (İşleme alınmadı) "approved" (Onay) "rejected" (Red) "under_review" (Görüşülüyor)');

            $table->timestamps();

            $table->foreign('frontend_offer_id')->references('id')->on('frontend_offers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_offer_statuses');
    }
};
