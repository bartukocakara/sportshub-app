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
        Schema::create('reservations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 255);
            $table->foreignUuid('user_id')
                  ->nullable(false);
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreignUuid('court_id')
                  ->nullable(false);
            $table->foreign('court_id')
                  ->references('id')
                  ->on('courts')
                  ->onDelete('cascade');
            $table->string('code', 10);
            $table->enum('field_usage_type', ['Half', 'Full'])->nullable(true);
            // $table->enum('payment_status', [ReservationPaymentStatusEnum::WAITING_FOR_PAYMENT->value,
            //                                 ReservationPaymentStatusEnum::PAYMENT_APPROVED->value,
            //                                 ReservationPaymentStatusEnum::PAYMENT_CANCELED->value,
            //                                 ReservationPaymentStatusEnum::PAYMENT_REFUNDED->value
            //                             ])->default(ReservationPaymentStatusEnum::WAITING_FOR_PAYMENT->value);
            $table->time('from_hour');
            $table->time('to_hour');
            $table->date('date');
            $table->decimal('price', 8, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
