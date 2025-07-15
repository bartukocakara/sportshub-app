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
            $table->string('status');

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
