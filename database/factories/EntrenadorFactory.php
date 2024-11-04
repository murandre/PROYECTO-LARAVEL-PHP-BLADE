<?php

namespace Database\Factories;

use App\Models\Entrenador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entrenador>
 */
class EntrenadorFactory extends Factory
{
    protected $model = Entrenador::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'especialidad' => $this->faker->randomElement(['Entrenamiento funcional', 'Musculacion', 'Entrenamiento deportivo especifico', 'Yoga y pilates', 'Cardio y resistencia']),
            'email' => $this->faker->unique()->safeEmail,
            'telefono' => $this->faker->phoneNumber,
            'fecha_contratacion' => now(),
            'activo' => $this->faker->boolean,
        ];
    }            

}
