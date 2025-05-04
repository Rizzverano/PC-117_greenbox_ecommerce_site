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
        Schema::create('vegefruits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('intro');
            $table->string('description');
            $table->string('ingred_one')->nullable();
            $table->string('ingred_two')->nullable();
            $table->string('ingred_three')->nullable();
            $table->string('ingred_four')->nullable();
            $table->string('ingred_five')->nullable();
            $table->string('ingred_six')->nullable();
            $table->string('ingred_seven')->nullable();
            $table->string('ingred_eight')->nullable();
            $table->string('ingred_nine')->nullable();
            $table->string('ingred_ten')->nullable();
            $table->bigInteger('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vegefruits');
    }
};
