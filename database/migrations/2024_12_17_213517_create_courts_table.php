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
        Schema::create('courts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('sport_type_id')
                  ->nullable(false);
            $table->foreign('sport_type_id')
                  ->references('id')
                  ->on('sport_types')
                  ->onDelete('cascade');
            $table->foreignUuid('court_business_id')
                  ->nullable(true);
            $table->foreign('court_business_id')
                  ->references('id')
                  ->on('court_businesses')
                  ->onDelete('cascade');
            $table->string('title');
            $table->string('zipcode')->nullable(true);
            $table->string('street_name')->nullable(true);
            $table->string('address_detail');
            $table->unsignedBigInteger('district_id')->nullable(true);
            $table->foreign('district_id')
                  ->references('id')
                  ->on('districts')
                  ->onDelete('cascade');
            $table->decimal('longitude', 10, 6); // 10 digits in total, 6 digits after the decimal point
            $table->decimal('latitude', 10, 6); // 10 digits in total, 6 digits after the decimal point
            $table->string('neighborhood')->nullable(true);
            $table->string('building_number')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courts');
    }
};
