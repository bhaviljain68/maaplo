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
        Schema::disableForeignKeyConstraints();

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->bigInteger('template_id');
            $table->foreign('template_id')->references('id')->on('item_templates');
            $table->string('name');
            $table->json('measurements');
            $table->json('design_details');
            $table->string('colors');
            $table->string('material');
            $table->text('reference_photos');
            $table->timestamp('trial_dates');
            $table->decimal('price');
            $table->string('status');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
