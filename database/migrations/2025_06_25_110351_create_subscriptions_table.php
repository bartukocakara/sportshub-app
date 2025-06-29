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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->uuid('subscription_plan_id');
            $table->foreign('subscription_plan_id')
                  ->references('id')
                  ->on('subscription_plans')
                  ->onDelete('cascade');
            // $table->uuid('integrated_channel_id')->nullable();
            // $table->foreign('integrated_channel_id')
            //       ->references('id')
            //       ->on('integrated_channels')
            //       ->onDelete('cascade');

            $table->string('status')->default('active'); // active, cancelled, expired vb.
            $table->string('promotion_code')->nullable();

            $table->timestamp('started_at')->nullable();
            $table->timestamp('ends_at')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
