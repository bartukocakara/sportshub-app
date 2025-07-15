<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Request\RequestStatusEnum;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('request_create_courts', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('requested_user_id');
            $table->foreign('requested_user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreignUuid('court_id');
            $table->foreign('court_id')
                  ->references('id')
                  ->on('courts')
                  ->onDelete('cascade');

            $table->string('status');


            $table->string('title');
            $table->date('expiring_date')->default(Carbon::today()->addWeek());

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_create_courts');
    }
};
