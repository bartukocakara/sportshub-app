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
        Schema::create('commissions', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID as the primary key
            $table->foreignUuid('court_business_id');
            $table->foreignUuid('admin_id');
            $table->decimal('percentage', 5, 2);  // Percentage (e.g., 10.00 for 10%)

            // Foreign key constraints
            $table->foreign('court_business_id')->references('id')->on('court_businesses')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commissions');
    }
};
