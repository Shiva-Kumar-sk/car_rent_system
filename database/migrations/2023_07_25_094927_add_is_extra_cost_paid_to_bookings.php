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
        Schema::table('bookings', function (Blueprint $table) {
            $table->decimal('over_cost_money')->after('money')->nullable();
            $table->decimal('extra_hour')->after('hours')->nullable();
            $table->integer('is_extra_cost_paid')->before('car_submitted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('over_cost_money');
            $table->dropColumn('extra_hour');
            $table->dropColumn('is_extra_cost_paid');
        });
    }
};
