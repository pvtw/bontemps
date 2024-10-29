<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingredients', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('recipes', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('ingredient_recipe', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('ingredient_id')->references('id')->on('ingredients');
            $table->foreignId('recipe_id')->references('id')->on('recipes');
            $table->string('unit');
            $table->unsignedBigInteger('quantity');
            $table->timestamps();
        });

        Schema::create('menus', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('menu_recipe', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('menu_id')->references('id')->on('menus');
            $table->foreignId('recipe_id')->references('id')->on('recipes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_recipe');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('ingredient_recipe');
        Schema::dropIfExists('recipes');
        Schema::dropIfExists('ingredients');
    }
};
