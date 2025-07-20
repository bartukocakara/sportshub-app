<?php

use App\Enums\FollowableStatusEnum;
use App\Enums\FollowStatusEnum;
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
        Schema::create('follows', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->uuidMorphs('followable');
            $table->enum('status', [
                FollowStatusEnum::ACCEPTED->value,
                FollowStatusEnum::PENDING->value,
            ])->default(FollowStatusEnum::PENDING->value);

            $table->timestamps();

            $table->unique(['user_id', 'followable_id', 'followable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follows');
    }
};
