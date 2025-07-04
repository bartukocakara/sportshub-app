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
        // Schema::create('message_channels', function (Blueprint $table) {
        //     $table->uuid('id')->primary();
        //     $table->string('key')->unique(); // 'mail', 'sms'
        //     $table->string('name'); // 'Email', 'SMS'
        //     $table->json('config')->nullable(); // API keys, sender ID, etc.
        //     $table->boolean('active')->default(true);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_channels');
    }
};
