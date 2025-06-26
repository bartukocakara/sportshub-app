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
        Schema::create('subscription_promotions', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique();      // Promosyon kodu
            $table->string('type');                 // percentage veya fixed
            $table->unsignedBigInteger('amount');  // İndirim miktarı (örneğin, %10 ise 10, sabit 500 ise 500 cent vb.)
            $table->timestamp('valid_until')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_promotions');
    }
};
