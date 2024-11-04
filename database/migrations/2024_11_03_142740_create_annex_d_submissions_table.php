<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnexDSubmissionsTable extends Migration
{
    public function up()
    {
        Schema::create('annex_d_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_activity2', 100);
            $table->string('place_of_activity2', 100);
            $table->date('start_date2');
            $table->date('end_date2');
            $table->integer('number_of_participants2');
            $table->string('campus_college_org2', 100);

            // Columns for attachments
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
            $table->string('attachment21_path')->nullable(); 


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('annex_d_submissions');
    }
}
