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
        Schema::create('product_wishes', function (Blueprint $table) {
            $table->id();
            $table->string("email", 50)->unique();
            $table->unsignedBigInteger("product_id")->unique();

            // Relationship
            $table->foreign("email")->references("profile_email")->on("profiles")->restrictOnDelete()->restrictOnUpdate();
            $table->foreign("product_id")->references("id")->on("products")->restrictOnDelete()->restrictOnUpdate();

            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_wishes');
    }
};
