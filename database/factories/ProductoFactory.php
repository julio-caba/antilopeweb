<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'descripcion' => $this->faker->word,
        'costo' => $this->faker->randomDigitNotNull,
        'precio' => $this->faker->randomDigitNotNull,
        'cat_producto' => $this->faker->randomDigitNotNull,
        'stock' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
