<?php

namespace Database\Factories;

use App\Models\Inscripciones;
use App\Models\Socio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inscripcion>
 */
class InscripcionesFactory extends Factory
{
    protected $model = Inscripciones::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'socio_id' => Socio::all()->random()->id,
            'fecha_inicio' => $this->faker->date,
            'fecha_fin' => $this->faker->date,
            'tipo' => $this->faker->randomElement(['mensual', 'anual']),
            'activo' => $this->faker->boolean,
        ];
    }
}
