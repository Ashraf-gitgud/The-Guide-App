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
        Schema::create('tourists', function (Blueprint $table) {
            $table->id("tourist_id");
            $table->string("full_name");
            $table->string("phone_number");
            $table->json("tourist_rating");
            $table->foreignId('user_id', 'user_id')->constrained()->onDelete('cascade')->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourists');
    }
};
