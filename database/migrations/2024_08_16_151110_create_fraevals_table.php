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
        Schema::create('fraevals', function (Blueprint $table) {
            $table->id();
            $table->string('Letter_of_Intent')->nullable();
            $table->string('Application_Form')->nullable();
            $table->string('Pre_Numbered_Tickets')->nullable();
            $table->string('Official_Receipts')->nullable();
            $table->string('Control_Sheets')->nullable();
            $table->string('Reservation_Slip')->nullable();
            $table->string('Goods_Services_Inspection')->nullable();
            $table->string('Statement_of_Projected_Net')->nullable();
            $table->string('user_email')->unique();
            $table->string('name_of_organization')->unique(); // Add this line
            $table->string('date_issued')->nullable();
            $table->timestamps();

            // Adding index for faster queries
            $table->index('user_email');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fraevals');
    }
};
