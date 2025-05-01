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
        Schema::create('seafoods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('intro');
            $table->string('description');
            $table->string('ingred_one')->nullable()->change();
            $table->string('ingred_two')->nullable()->change();
            $table->string('ingred_three')->nullable()->change();
            $table->string('ingred_four')->nullable()->change();
            $table->string('ingred_five')->nullable()->change();
            $table->string('ingred_six')->nullable()->change();
            $table->string('ingred_seven')->nullable()->change();
            $table->string('ingred_eight')->nullable()->change();
            $table->string('ingred_nine')->nullable()->change();
            $table->string('ingred_ten')->nullable()->change();
            $table->bigInteger('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seafoods');
    }
};
