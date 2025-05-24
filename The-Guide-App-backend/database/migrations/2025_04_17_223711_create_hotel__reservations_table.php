<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotel_reservations', function (Blueprint $table) {
            $table->id();
            $table->string("room_type");
            $table->integer("people_number");
            $table->date("start_date");
            $table->date("end_date");
            $table->enum("status", ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->foreignId("hotel_id")->constrained('hotels', 'hotel_id')->onDelete('cascade')->onUpdate("cascade");
            $table->foreignId("user_id")->constrained('users', 'user_id')->onDelete('cascade')->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_reservations');
    }
};
