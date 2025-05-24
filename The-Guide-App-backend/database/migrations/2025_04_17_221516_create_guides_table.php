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
        Schema::create('guides', function (Blueprint $table) {
            $table->id("guide_id");
            $table->string("carte_nationale");
            $table->string("license_guide");
            $table->string("full_name");
            $table->string("phone_number");
            $table->string("rating");
            $table->foreignId('user_id', 'user_id')->constrained()->onDelete('cascade')->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guides');
    }
};
