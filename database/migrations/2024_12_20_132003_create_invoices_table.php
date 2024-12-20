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
        Schema::create('invoices', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Primary UUID for the invoice
            $table->foreignUuid('court_business_id') // Relation to the CourtBusiness
                  ->constrained('court_businesses') // Ensure it points to the 'court_businesses' table
                  ->onDelete('cascade'); // Handle cascading delete if the related court business is deleted
            $table->foreignUuid('admin_id') // Relation to the Admin (User who made the payment)
                  ->constrained('admins') // Ensure it points to the 'users' table
                  ->onDelete('cascade'); // Handle cascading delete if the related admin is deleted
            $table->decimal('amount', 15, 2); // The amount of the invoice
            $table->date('due_date'); // Due date of the invoice
            $table->string('status')->default('unpaid'); // Invoice status, default is 'unpaid'
            $table->timestamps(); // Automatically generated timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
