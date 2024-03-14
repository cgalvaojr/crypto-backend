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
        Schema::create('cryptocurrency_group', function(Blueprint $table) {
            $table->foreignId('group_id')->references('id')->on('group')->onDelete('cascade');
            $table->foreignId('cryptocurrency_id')->references('id')->on('cryptocurrency');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('cryptocurrency_group');
    }
};
