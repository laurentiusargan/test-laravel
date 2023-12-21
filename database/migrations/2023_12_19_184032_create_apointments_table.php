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
        Schema::create('apointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('patient_id');
            $table->unsignedInteger('event_type_id');
            $table->unsignedInteger('room_id');
            $table->string('room');
            $table->string('title');
            $table->string('status');
            $table->string('canceled_at')->nullable();
            $table->string('rescheduled_at')->nullable();
            $table->string('checkin_at')->nullable();
            $table->string('start_at');
            $table->string('end_at');
            $table->string('checkout_at')->nullable();
            $table->string('missed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apointments');
    }
};
