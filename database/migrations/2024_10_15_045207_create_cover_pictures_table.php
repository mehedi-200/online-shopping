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
        Schema::create('cover_pictures', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('image')->default('cover.jpg');
            $table->integer('top_position')->default(40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cover_pictures');
    }
};
