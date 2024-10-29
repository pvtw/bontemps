<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Menu;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

final class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::factory(10)
            ->has(Recipe::factory()
                ->hasAttached(Ingredient::factory(), [
                    'unit' => fake()->word(),
                    'quantity' => random_int(1, 1000),
                ]))
            ->create();
    }
}
