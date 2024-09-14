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
            $table->string('name_of_project');
            $table->string('date_duration');
            $table->string('requesting_organization');
            $table->string('college_branch');
            $table->string('representative');
            $table->string('address_contact');
            $table->string('objectives');
            $table->string('estimate_income');
            $table->string('price_ticket');
            $table->string('total_estimate_ticket');
            $table->string('other_income')->nullable();
            $table->string('total_estimated_income');
            $table->json('expenditures')->nullable();
            $table->json('amount')->nullable();
            $table->string('total_budget_expenses_php');
            $table->string('total_estimated_proceeds');
            $table->string('utilization_plan');
            $table->string('solicitation');
            $table->string('coordinator');
            $table->string('participants');
            $table->string('president');
            $table->string('treasurer');
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
