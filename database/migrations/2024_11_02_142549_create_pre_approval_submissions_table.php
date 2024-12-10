<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreApprovalSubmissionsTable extends Migration
{
    public function up()
    {
        Schema::create('pre_approval_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_activity', 100);
            $table->string('place_of_activity', 100);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('number_of_participants');
            $table->string('campus_college_org', 100);

        // Columns for attachments
        $table->string('attachment1_path')->nullable(); // Letter of Intent
        $table->string('attachment2_path')->nullable(); // Letter of Invitation
        $table->string('attachment3_path')->nullable(); // Endorsement
        $table->string('attachment4_path')->nullable(); // Program of Activities
        $table->string('attachment5_path')->nullable(); // Participants List
        $table->string('attachment6_path')->nullable(); // Student Certificate
        $table->string('attachment7_path')->nullable(); // Curriculum Copy
        $table->string('attachment8_path')->nullable(); 
        $table->string('attachment9_path')->nullable(); 
        $table->string('attachment10_path')->nullable();
        $table->string('attachment11_path')->nullable(); 
        $table->string('attachment12_path')->nullable(); 
        $table->string('attachment13_path')->nullable(); 
        $table->string('attachment14_path')->nullable(); 
        $table->string('attachment15_path')->nullable(); 
        $table->string('attachment16_path')->nullable(); 
        $table->string('attachment17_path')->nullable();
        $table->string('attachment18_path')->nullable(); 
        $table->string('attachment19_path')->nullable(); 
        $table->string('attachment20_path')->nullable(); 


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pre_approval_submissions');
    }
}
