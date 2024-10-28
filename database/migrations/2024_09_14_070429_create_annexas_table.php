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
            $table->text('email');
            $table->text('name_of_project');
            $table->text('start_date');
            $table->text('end_date');
            $table->text('requesting_organization');
            $table->text('college_branch');
            $table->text('representative');
            $table->text('address');
            $table->text('contact');
            $table->text('objectives');
            $table->json('items_to_be_sold')->nullable();
            $table->json('item_pieces')->nullable();
            $table->json('price_ticket')->nullable();
            $table->json('total_estimate_ticket')->nullable();
            $table->json('other_income')->nullable();
            $table->json('income_amount')->nullable();
            $table->text('total_estimated_income');
            $table->json('expenditures')->nullable();
            $table->json('amount')->nullable();
            $table->text('total_budget_expenses_php');
            $table->text('total_estimated_proceeds');
            $table->text('utilization_plan')->nullable();
            $table->text('solicitation')->nullable();
            $table->text('coordinator')->nullable();
            $table->text('participants')->nullable();
            $table->text('president')->nullable();
            $table->text('treasurer')->nullable();
            $table->text('branch')->nullable();
            $table->string('activity')->default('FRA');
            $table->enum('status', ['Pending Approval', 'Returned', 'Approved'])->default('Pending Approval')->nullable();
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
