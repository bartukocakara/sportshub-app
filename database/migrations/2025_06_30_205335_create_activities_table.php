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
        Schema::create('activities', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // Who triggered the activity
            $table->foreignUuid('causer_id')->nullable()->constrained('users')->nullOnDelete();

            // What kind of activity this is (join, comment, invite, etc.)
            $table->string('type');

            // What the activity is related to (match, team, court, etc.)
            $table->uuid('subject_id');
            $table->string('subject_type'); // e.g. App\Models\Match, App\Models\Team, etc.

            // Optional message or payload
            $table->json('properties')->nullable();

            // Is this activity visible to others? (for privacy or moderation)
            $table->boolean('is_public')->default(true);

            // For feed optimization or future logic
            $table->timestamp('activity_at')->nullable();

            $table->timestamps();

            $table->index(['subject_type', 'subject_id']);
            $table->index(['causer_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
