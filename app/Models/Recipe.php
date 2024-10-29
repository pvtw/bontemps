<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Recipe extends Model
{
    /** @use HasFactory<\Database\Factories\RecipeFactory> */
    use HasFactory;

    public function ingredients(): BelongsToMany
    {
        return $this
            ->belongsToMany(Ingredient::class)
            ->using(IngredientRecipe::class)
            ->withPivot([
                'unit',
                'quantity',
            ])
            ->withTimestamps();
    }

    public function menus(): BelongsToMany
    {
        return $this
            ->belongsToMany(Menu::class)
            ->using(MenuRecipe::class)
            ->withTimestamps();
    }
}
