<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id(); // This will create an unsigned BIGINT as the primary key
            $table->string('name'); // Column for organization name
            $table->string('email')->unique(); // Column for organization email, must be unique
            // Add other necessary fields here
            $table->timestamps(); // This will create created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('organizations'); // This will drop the organizations table if it exists
    }
}
