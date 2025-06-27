<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->uuid('payment_provider_id');
            $table->foreign('payment_provider_id')
                  ->references('id')
                  ->on('payment_providers')
                  ->onDelete('cascade');
            // ✅ Foreign relation to integrated_channels (only for type = 'payment')

            $table->string('transaction_id')->nullable();
            $table->bigInteger('amount_minor'); // store in cents, kurus, etc.
            $table->string('currency', 3); // ISO 4217: USD, EUR, TRY

            $table->string('status'); // success, failed, pending
            $table->json('response_payload')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_transactions');
    }
};
