<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    protected $model = Producto::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'precio_compra' => $this->faker->randomFloat(2, 1, 100),
            'precio_venta' => $this->faker->randomFloat(2, 1, 150),
            'cantidad' => $this->faker->numberBetween(1, 100),
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
            'descripcion' => $this->faker->sentence,
            'imagen' => $this->faker->imageUrl(),
        ];
    }
}
