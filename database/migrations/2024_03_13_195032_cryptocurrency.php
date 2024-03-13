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
        Schema::create('cryptocurrency', function(Blueprint $table) {
            $table->id('id');
            $table->string('name', 50);
            $table->string('symbol', 3);
            $table->integer('cmc_rank');
            $table->integer('market_cap');
            $table->double('price', 16, 2);
            $table->integer('volume_24h');
            $table->integer('percent_change_24h');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('cryptocurrency');
    }
};
