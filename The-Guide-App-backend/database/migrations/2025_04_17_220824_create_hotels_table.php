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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id("hotel_id");
            $table->string("name");
            $table->string("email")->unique();
            $table->string("phone_number");
            $table->string("adress");
            $table->string("hotel_rating");
            $table->string("rating");
            $table->json("position")->nullable();
            $table->string("status")->default("pending");
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
