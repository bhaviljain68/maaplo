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
        Schema::table('order_items', function (Blueprint $table) {
            // New fields
            $table->string('material_code')->nullable()->after('material');
            $table->string('work_type')->nullable()->after('material_code');
            $table->enum('refrence_dress', ['yes', 'no'])->default('no')->after('work_type');
            
            // Cost breakdown
            $table->decimal('material_cost', 10, 2)->nullable()->after('price');
            $table->decimal('stiching_cost', 10, 2)->nullable()->after('material_cost');
            $table->decimal('item_cost', 10, 2)->nullable()->after('stiching_cost');
        });
    }

    /**
     * Reverse the migrations.
     */
    
};
