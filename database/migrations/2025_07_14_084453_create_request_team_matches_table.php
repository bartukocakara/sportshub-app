<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('request_team_matches', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('requested_user_id')
                  ->nullable(false);
            $table->foreign('requested_user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreignUuid('requested_team_id')
                  ->nullable(false);
            $table->foreign('requested_team_id')
                  ->references('id')
                  ->on('teams')
                  ->onDelete('cascade');

            $table->foreignUuid('match_id')
                  ->nullable(false);
            $table->foreign('match_id')
                  ->references('id')
                  ->on('matches')
                  ->onDelete('cascade');

            $table->string('status');
            $table->string('type');

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
        Schema::dropIfExists('request_team_matches');
    }
};
