<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('sessions', function (Blueprint $table) {
            // Directly alter the user_id column to UUID with explicit casting
            DB::statement('ALTER TABLE sessions ALTER COLUMN user_id TYPE uuid USING user_id::text::uuid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sessions', function (Blueprint $table) {
            // Revert user_id to bigint with explicit casting
            DB::statement('ALTER TABLE sessions ALTER COLUMN user_id TYPE bigint USING user_id::text::bigint');
        });
    }
};
