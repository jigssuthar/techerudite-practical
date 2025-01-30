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
        // Add first_name and last_name columns (non-nullable)
        $table->string('first_name');
        $table->string('last_name');
    
        // Remove username column
        $table->dropColumn('name');
    });
}

/**
 * Reverse the migrations.
 */
public function down()
{
    Schema::table('users', function (Blueprint $table) {
        // Remove first_name and last_name columns
        $table->dropColumn(['first_name', 'last_name']);
    
        // Add username column back
        $table->string('name')->unique();
    });
}

};
