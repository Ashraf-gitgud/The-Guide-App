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
        Schema::create('guide_reservations', function (Blueprint $table) {
            $table->id();
            $table->integer("people_number");
            $table->date("start_date");
            $table->date("end_date");
            $table->time("time");
            $table->string("location");
            $table->enum("status", ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->foreignId("guide_id")->constrained('guides', 'guide_id')->onDelete('cascade')->onUpdate("cascade");
            $table->foreignId("user_id")->constrained('users', 'user_id')->onDelete('cascade')->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guide_reservations');
    }
};
