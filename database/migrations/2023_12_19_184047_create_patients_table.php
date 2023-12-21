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
        Schema::create('patients', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedInteger('user_id')->index();
            $table->string('type');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('preferred_name');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('birthday');
            $table->string('email');
            $table->bigInteger('phone');
            $table->string('gender');
            $table->string('incident_type');
            $table->string('incident_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
