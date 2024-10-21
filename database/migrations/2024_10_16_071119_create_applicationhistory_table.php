<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('application_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->onDelete('cascade')->unsigned();
            $table->string('document')->nullable();
            $table->date('date_issued');
            $table->string('proposed_activity');
            $table->string('location');
            $table->string('status'); // e.g., Pending Approval, Approved, Rejected
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('application_histories');
    }
}
