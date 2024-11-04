<?php

namespace Database\Factories;

use App\Models\Equipos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipo>
 */
class EquiposFactory extends Factory
{
    protected $model = Equipos::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement(['Mancuerna', 'Barra 20kg', 'Barra 15kg' , 'Colchoneta' , 'Camilla' , 'Camilla Banco Plano' , 'Camilla Banco Inclinado', 'Cinta' , 'Maquina Bicep' , 'Polea 100kgMAX' , 'Hammer Press de Pecho' , 'Dorsalera Hammer' , 'Squat Rack']),
            'descripcion' => $this->faker->sentence,
            'cantidad' => $this->faker->numberBetween(1, 100),
            'disponible' => $this->faker->boolean,
        ];
    }
}
