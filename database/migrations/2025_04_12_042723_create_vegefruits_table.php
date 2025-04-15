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
            $table->string('ingred_one');
            $table->string('ingred_two');
            $table->string('ingred_three');
            $table->string('ingred_four');
            $table->string('ingred_five');
            $table->string('ingred_six');
            $table->string('ingred_seven');
            $table->string('ingred_eight');
            $table->string('ingred_nine');
            $table->string('ingred_ten');
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
