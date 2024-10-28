<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Event title
            $table->text('description')->nullable(); // Event description
            $table->string('href')->nullable(); // URL link to the Facebook post
            $table->string('image')->nullable(); // Path to the event image
            $table->string('category')->default('In-Campus'); // Category (In-Campus, Off-Campus, etc.)
            $table->string('organization'); // Organization that created the event
            $table->string('department')->nullable(); // Department column added
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
