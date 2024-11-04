<?php

namespace Database\Factories;

use App\Models\Pagos;
use App\Models\Socio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pago>
 */
class PagosFactory extends Factory
{
    protected $model = Pagos::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'socio_id' => Socio::all()->random()->id,
            'monto' => $this->faker->randomFloat(2, 10, 1000),
            'fecha_pago' => now(),
            'metodo_pago' => $this->faker->randomElement(['Tarjeta de crédito', 'Efectivo', 'Debito', 'Transferencia']),
            'confirmado' => $this->faker->boolean,
        ];
    }
}
