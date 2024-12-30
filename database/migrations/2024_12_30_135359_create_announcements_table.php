<?php

use App\Enums\AnnouncementTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('sport_type_id');
            $table->foreign('sport_type_id')
                  ->references('id')
                  ->on('sport_types')
                  ->onDelete('cascade');
            $table->enum('type', [AnnouncementTypeEnum::INVITER->value,
                                    AnnouncementTypeEnum::PARTICIPANT->value])
                    ->default(AnnouncementTypeEnum::PARTICIPANT->value);
            $table->string('subject_type');
            $table->foreignUuid('subject_id')->nullable();
            $table->foreignUuid('created_user_id')
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->string('title');
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
};
