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
        Schema::create('preevalstatuscreations', function (Blueprint $table) {
            $table->id();
            $table->string('user_email'); // Correct type
            $table->string('name_of_organization')->nullable(); // Change to string
            $table->date('date_issued')->nullable();
            $table->string('pre_eval_type')->nullable();
            $table->integer('documents')->nullable();
            $table->string('status')->default('Pending');
            $table->timestamps();
        
            // Adding indexes for faster queries
            $table->index('user_email');
            $table->index('name_of_organization');
        
            // Adding foreign key constraints
            $table->foreign('user_email')->references('user_email')->on('fraevals')->onDelete('cascade');
            $table->foreign('name_of_organization')->references('name_of_organization')->on('offcamps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preevalstatuscreations');
    }
};
