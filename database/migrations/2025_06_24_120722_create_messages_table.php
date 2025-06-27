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
        Schema::create('messages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type'); // 'mail', 'sms', etc.
            $table->string('template_code')->nullable();
            $table->string('recipient'); // email or phone number
            $table->string('subject')->nullable(); // for email
            $table->text('body');
            $table->json('meta')->nullable(); // optional template data, etc.
            $table->string('status')->default('pending'); // pending, sent, failed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
