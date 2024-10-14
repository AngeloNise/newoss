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
        Schema::create('annexcs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_of_organization');
            $table->json('qty');
            $table->json('unit');
            $table->json('item_description')->nullable();
            $table->json('serial_no')->nullable();
            $table->json('property_no')->nullable();
            $table->json('unit_cost');
            $table->json('total_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annexcs');
    }
};
