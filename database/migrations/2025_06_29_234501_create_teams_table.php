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
        Schema::create('teams', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('sport_type_id')
                  ->nullable(true);
            $table->foreign('sport_type_id')
                  ->references('id')
                  ->on('sport_types')
                  ->onDelete('cascade');

            $table->string('team_status');
            $table->unsignedBigInteger('city_id')
                  ->nullable(true);
            $table->foreign('city_id')
                  ->references('id')
                  ->on('cities');
            $table->integer('player_count')
                  ->nullable();
            $table->string('title');
            $table->string('gender');
            $table->integer('max_player')->default(20);
            $table->integer('min_player')->default(4);
            // v2 de eklencek
            // $table->enum('level', ['PROF', 'SEMI_PROF', 'COMPETITIVE', 'CASUAL', 'JUST_FOR_FUN']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
