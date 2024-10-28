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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->text('email'); // Consider using string if you want to enforce a format
            $table->text('activity');
            $table->text('name_of_project');
            $table->text('start_date');
            $table->text('end_date');
            $table->text('requesting_organization');
            $table->text('college_branch');
            $table->text('total_estimated_income');
            $table->enum('status', ['Pending Approval', 'Returned', 'Approved'])->default('Pending Approval')->nullable();
            $table->enum('current_file_location', ['Forwarded by OSS', 'Returned to OSS', 'OSS'])->default('OSS')->nullable();
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('annexas');
    }
};
