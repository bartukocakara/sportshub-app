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
        // Schema::create('journal_entries', function (Blueprint $table) {
        //     $table->uuid('id')->primary();
        //     $table->uuid('invoice_id')->nullable();
        //     $table->foreign('invoice_id')
        //           ->references('id')
        //           ->on('invoices')
        //           ->onDelete('cascade');
        //     $table->uuid('ledger_account_id')->nullable();
        //     $table->foreign('ledger_account_id')
        //           ->references('id')
        //           ->on('ledger_accounts')
        //           ->onDelete('cascade');
        //     $table->decimal('debit', 12, 2)->default(0);
        //     $table->decimal('credit', 12, 2)->default(0);
        //     $table->string('description')->nullable();
        //     $table->date('entry_date');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journal_entries');
    }
};
