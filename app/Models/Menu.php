<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Menu extends Model
{
    /** @use HasFactory<\Database\Factories\MenuFactory> */
    use HasFactory;

    public function recipes(): BelongsToMany
    {
        return $this
            ->belongsToMany(Recipe::class)
            ->using(MenuRecipe::class)
            ->withTimestamps();
    }
}
