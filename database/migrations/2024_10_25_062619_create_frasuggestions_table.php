<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrasuggestionsTable extends Migration
{
    public function up()
    {
        Schema::create('frasuggestions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('annexas')->onDelete('cascade'); // Link to the AnnexA table
            $table->json('section'); // JSON field to store sections as an array
            $table->json('comment'); // JSON field to store comments as an array
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('frasuggestions');
    }
}
