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
            $table->integer('group_id')->foreign('group_id', 'group_id_fk_index')->references('id')->on('group')->onDelete('cascade');
            $table->integer('cryptocurrency_id')->foreign('cryptocurrency_id', 'cryptocurrency_id_fk_index')->references('id')->on('cryptocurrency');
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
