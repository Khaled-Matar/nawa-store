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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories', 'id')
                ->nullOnDelete(); // ==  // $table->unsignedBigInteger('category_id')->references('id')->on('categories');

            $table->longText('description')->nullable(); // يحجز 4 جيجا // == // $table->text('description'); // يحجز 4000 حرف
            $table->longText('short_description')->nullable(); // يحجز 4 جيجا // == // $table->text('description'); // يحجز 4000 حرف
            $table->float('price')->default(0);
            $table->float('compare_price')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('quantity')
                ->default(0);
            $table->enum('status', ['draft', 'active', 'archived'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
