<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_project');
            $table->string('name_of_organization');
            $table->enum('proposed_activity', ['off campus', 'in campus', 'fund raising'])->nullable();
            $table->enum('status', ['Pending Approval', 'Rejected', 'Approved'])->default('Pending Approval')->nullable();
            $table->enum('current_file_location', ['Forwarded by OSS', 'Returned to OSS', 'OSS'])->default('OSS')->nullable();
            $table->date('submission_date')->default(now());
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
