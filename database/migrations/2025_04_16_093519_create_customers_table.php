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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', ["m", "f", "o"]); // Define possible values for gender
            $table->string('phone');
            $table->string('email')->unique();
            $table->date('dob')->nullable();
            $table->json('address');
            $table->json('base_measurements')->nullable(); // Nullable for optional base measurements
            $table->json('notes');
            $table->timestamps(); // Automatically creates created_at and updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
