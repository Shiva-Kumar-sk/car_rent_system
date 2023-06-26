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
        Schema::create('vehicles', function (Blueprint $table) {
                $table->id();
                $table->string('model');
                $table->string('year');
                $table->string('fuel_type');
                $table->text('features');
                $table->string('mileage');
                $table->string('seating_capacity');
                $table->string('image')->nullable(); 
                $table->integer('branch_id');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
