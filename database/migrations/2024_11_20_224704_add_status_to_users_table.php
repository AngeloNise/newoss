<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('status')->default('Without Deficiencies')->after('colleges');
            $table->string('remarks')->nullable()->after('status'); // Adds the remarks column
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('remarks');
            $table->dropColumn('status');
        });
    }
    
};
