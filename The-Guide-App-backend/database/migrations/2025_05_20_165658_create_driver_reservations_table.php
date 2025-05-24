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
        Schema::create('driver_reservations', function (Blueprint $table) {
            $table->id();
            $table->integer("people_number");
            $table->date("date");
            $table->time("time");
            $table->string("start_place");
            $table->string("end_place");
            $table->enum("status", ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->foreignId("driver_id")->constrained('drivers', 'driver_id')->onDelete('cascade')->onUpdate("cascade");
            $table->foreignId("user_id")->constrained('users', 'user_id')->onDelete('cascade')->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_reservations');
    }
};
