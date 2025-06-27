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
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');                       // Plan adı (örneğin: "Aylık Gold")
            $table->string('interval');                   // weekly, monthly, yearly
            $table->string('currency', 3)->default('USD');// Para birimi, ISO Kodu
            $table->unsignedBigInteger('amount_minor');  // Para biriminin en küçük birimi (ör: 1000 = 10.00 USD)
            $table->text('description')->nullable();     // Plan açıklaması
            $table->boolean('active')->default(true);    // Plan aktif mi?
            $table->json('features')->nullable(); // Add features column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_plans');
    }
};
