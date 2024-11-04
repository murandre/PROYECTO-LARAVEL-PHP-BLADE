<?php

namespace Database\Factories;

use App\Models\Entrenador;
use App\Models\Rutinas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rutina>
 */
class RutinasFactory extends Factory
{
    protected $model = Rutinas::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement(['Espalda & Tricep', 'Pecho & Bicep', 'Tren Inferior', 'Resistencia', 'Brazo completo', 'Hombro']),
            'descripcion' => $this->faker->sentence,
            'dificultad' => $this->faker->randomElement(['Fácil', 'Medio', 'Difícil']),
            'entrenador_id' => Entrenador::all()->random()->id,
            'fecha_creacion' => now(),
        ];
    }
}
