<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Ingredient extends Model
{
    /** @use HasFactory<\Database\Factories\IngredientFactory> */
    use HasFactory;

    public function recipes()
    {
        return $this
            ->belongsToMany(Recipe::class)
            ->using(IngredientRecipe::class)
            ->withPivot([
                'unit',
                'quantity',
            ])
            ->withTimestamps();
    }
}
