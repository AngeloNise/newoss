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
        Schema::create('offcamps', function (Blueprint $table) {
            $table->id();
            $table->string('letter_of_intent')->nullable();
            $table->string('letter_of_invitation')->nullable();
            $table->string('endorsement_from_research_management_office')->nullable();
            $table->string('copy_of_program_of_activities')->nullable();
            $table->string('list_of_participants_and_personnel_in_charge')->nullable();
            $table->string('latest_student_certificate_of_registration')->nullable();
            $table->string('copy_of_curriculum')->nullable();
            $table->string('user_email')->unique();
            $table->string('name_of_organization')->unique();
            $table->string('date_issued')->nullable();
            $table->timestamps();

            // Adding index for faster queries
            $table->index('name_of_organization');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offcamps');
    }
};
