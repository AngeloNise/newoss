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
        Schema::create('annexbs', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_org');
            $table->string('img');
            $table->enum('semester', ['1st sem', '2nd sem', 'summer sem']);
            $table->string('school_year');
            $table->string('period_covered');
            $table->string('cash_balance')->nullable();
            $table->string('cash_receipt')->nullable();
            $table->string('solicitation')->nullable();
            $table->string('cash_available')->nullable();
            $table->string('cash_disbursements');
            $table->string('ending_cash_balance');
            $table->json('date_receipt')->nullable();
            $table->json('invoice_no_receipt')->nullable();
            $table->json('particulars')->nullable();
            $table->json('amount')->nullable();
            $table->json('remarks_receipt')->nullable();
            $table->string('total_receipt');
            $table->json('date_disburse')->nullable();
            $table->json('invoice_no_disburse')->nullable();
            $table->json('description')->nullable();
            $table->json('purpose')->nullable();
            $table->json('remarks_disburse')->nullable();
            $table->string('total_disburse');
            $table->string('prepared')->nullable();
            $table->string('checked')->nullable();
            $table->string('approved')->nullable();
            $table->string('certified')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('annexbs');
    }
};
