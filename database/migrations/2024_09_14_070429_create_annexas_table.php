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
        Schema::create('annexas', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('name_of_project');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('requesting_organization');
            $table->string('college_branch');
            $table->string('representative');
            $table->string('address_contact');
            $table->string('objectives');
            $table->string('estimate_income')->nullable();
            $table->string('price_ticket')->nullable();
            $table->string('total_estimate_ticket')->nullable();
            $table->json('other_income')->nullable();
            $table->string('total_estimated_income');
            $table->json('expenditures')->nullable();
            $table->json('amount')->nullable();
            $table->string('total_budget_expenses_php');
            $table->string('total_estimated_proceeds');
            $table->string('utilization_plan')->nullable();
            $table->string('solicitation')->nullable();
            $table->string('coordinator')->nullable();
            $table->string('participants')->nullable();
            $table->string('president')->nullable();
            $table->string('treasurer')->nullable();
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('annexas');
    }
};
