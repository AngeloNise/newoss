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
            $table->foreignId('application_id')->constrained()->onDelete('cascade');
            $table->string('start_date')->nullable(); // This should be a string for old/new json values
            $table->string('end_date')->nullable(); // This should be a string for old/new json values
            $table->string('total_estimated_income')->nullable(); // This should be a string for old/new json values
            $table->string('status')->nullable(); // This should be a string for old/new json values
            $table->string('current_file_location')->nullable(); // This should be a string for old/new json values
            $table->date('submission_date')->nullable(); // Ensure this line exists
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('application_logs');
    }
}
