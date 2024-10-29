<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

final class MenuRecipe extends Pivot
{
    public $incrementing = true;
}
