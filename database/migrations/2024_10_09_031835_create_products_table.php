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
            $table->bigInteger('category_id');
            $table->bigInteger('subcategory_id');
            $table->string('name');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->bigInteger('price');
            $table->string('details');
            $table->string('image')->nullable();
            $table->string('featured')->nullable();
            $table->string('new_arrival')->nullable();
            $table->bigInteger('likes')->default(0);
            $table->bigInteger('view')->default(0);
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
