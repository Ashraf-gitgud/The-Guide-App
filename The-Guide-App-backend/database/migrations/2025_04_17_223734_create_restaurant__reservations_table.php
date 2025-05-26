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
        Schema::create('restaurant_reservations', function (Blueprint $table) {
            $table->id();
            $table->integer("people_number");
            $table->date("date");
            $table->time("time");
            $table->enum("status", ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->foreignId("restaurant_id")->constrained('restaurants', 'restaurant_id')->onDelete('cascade')->onUpdate("cascade");
            $table->foreignId("user_id")->constrained('users', 'user_id')->onDelete('cascade')->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_reservations');
    }
};
