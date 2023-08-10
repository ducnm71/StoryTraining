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
        Schema::create('text_config', function (Blueprint $table) {
            $table->id();
            $table->foreignId('text_id')->references('id')->on('text')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('page_id')->references('id')->on('page')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->bigInteger('point_x');
            $table->bigInteger('point_y');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('text_config');
    }
};
