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
        Schema::create('court_businesses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 255);
            $table->string('tax_no', 255);
            $table->string('phone', 20)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('address', 255);
            $table->unsignedBigInteger('district_id')->nullable(true);
            $table->foreign('district_id')
                  ->references('id')
                  ->on('districts')
                  ->onDelete('cascade');
            $table->decimal('longitude', 10, 6);
            $table->decimal('latitude', 10, 6);
            $table->string('postal_code', 20);
            $table->decimal('standard_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('court_businesses');
    }
};
