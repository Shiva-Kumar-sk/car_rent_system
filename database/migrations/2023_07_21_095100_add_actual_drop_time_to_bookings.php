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
        $table->timestamp('actual_drop_time')->after('drop_of_date')->nullable();
        $table->integer('car_submitted')->after('status')->nullable();
        $table->text('over_cost_invoice_link')->after('booking_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('actual_drop_time');
            $table->dropColumn('car_submitted');
            $table->dropColumn('over_cost_invoice_link');
        });
    }
};
