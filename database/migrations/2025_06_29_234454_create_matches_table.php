<?php

use Carbon\Carbon;
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
        Schema::create('matches', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('court_id')
                  ->nullable(true);
            $table->foreign('court_id')
                  ->references('id')
                  ->on('courts')
                  ->onDelete('cascade');

            // $table->foreignUuid('payment_transaction_id')
            //       ->nullable(true);
            // $table->foreign('payment_transaction_id')
            //       ->references('id')
            //       ->on('payment_transactions')
            //       ->onDelete('cascade');

            // $table->foreignUuid('reservation_id')
            //       ->nullable(true);
            // $table->foreign('reservation_id')
            //       ->references('id')
            //       ->on('reservations')
            //       ->onDelete('cascade');

            $table->enum('match_status', ['PENDING','ACTIVE', 'CANCELLED', 'COMPLETED'])->default('PENDING');


            $table->foreignUuid('sport_type_id')
                  ->references('id')
                  ->on('sport_types')
                  ->onDelete('cascade');

            $table->smallInteger('type')->nullable(false)->comment('PLAYER = 1, TEAM = 2');
            $table->enum('gender', ['MAN', 'WOMAN', 'MIX'])->nullable(true);

            $table->decimal('price', 8, 2)->nullable(true);
            $table->string('title');
            $table->string('description')->nullable(true);
            $table->integer('max_player');
            $table->integer('min_player');
            $table->integer('max_team');
            $table->integer('min_team')->default(2);
            $table->time('from_hour', 0)->nullable();
            $table->time('to_hour', 0)->nullable();
            $table->date('start_date');
            $table->date('expiring_date')->default(Carbon::today()->addWeek());

            $table->date('play_date')->nullable();
            $table->boolean('is_court_private')->default(true);
            // $table->enum('level', ['PROF', 'SEMI_PROF', 'COMPETITIVE', 'CASUAL', 'JUST_FOR_FUN']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
