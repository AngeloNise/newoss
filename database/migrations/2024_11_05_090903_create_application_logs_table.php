<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationLogsTable extends Migration
{
    public function up()
    {
        Schema::create('application_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained()->onDelete('cascade'); // Foreign key to the Application table
            $table->string('document')->nullable(); // Store document name/path
            $table->text('comment')->nullable(); // Store the comment text
            $table->string('start_date')->nullable(); // Assuming this stores old/new values for the start date
            $table->string('end_date')->nullable(); // Assuming this stores old/new values for the end date
            $table->string('total_estimated_income')->nullable();
            $table->string('status')->nullable();
            $table->string('current_file_location')->nullable();
            $table->date('submission_date')->nullable();
            $table->string('updated_by')->nullable(); // Store the user's name
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('application_logs');
    }
}
