<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // ✅ Foreign relation to integrated_channels (only for type = 'payment')
            $table->foreignId('integrated_channel_id')
                  ->constrained('integrated_channels')
                  ->onDelete('cascade');

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
