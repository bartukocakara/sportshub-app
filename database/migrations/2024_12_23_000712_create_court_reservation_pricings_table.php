<?php

use App\Enums\StatusEnums\Court\CourtReservationPricingStatusEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Enums\TypeEnums\FieldUsageTypeEnum;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('court_reservation_pricings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('court_id')
                  ->nullable(false);
            $table->foreign('court_id')
                  ->references('id')
                  ->on('courts')
                  ->onDelete('cascade');
            $table->enum('day_of_week', [
                    'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'
                ]);
            $table->json('hours');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('court_reservation_pricings');
    }
};
