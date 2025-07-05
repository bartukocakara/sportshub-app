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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('user_id')
                  ->nullable(true);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('title');
            $table->string('zipcode')->nullable(true);
            $table->string('street_name')->nullable(true);
            $table->string('detail')->nullable(true);
            $table->unsignedBigInteger('district_id')->nullable(true);
            $table->foreign('district_id')
                  ->references('id')
                  ->on('districts')
                  ->onDelete('cascade');
            // $table->text('geolocation');
            $table->decimal('longitude', 10, 6); // 10 digits in total, 6 digits after the decimal point
            $table->decimal('latitude', 10, 6); // 10 digits in total, 6 digits after the decimal point
            $table->string('neighborhood')->nullable(true);
            $table->string('building_number')->nullable(true);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
