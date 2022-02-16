<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BondCheck>
 */
class BondCheckFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = Carbon::today()->subDays($this->faker->numberBetween(0, 7));
        return [
            'awb_no' => $this->faker->randomElement(['176', '020', '485']) . $this->faker->randomNumber(8, true),
            'location' => $this->faker->randomElement(['Heavy', 'Strongroom', 'Coldroom', 'DGR', 'General Warehouse']),
            'date_captured' => $date,
            'captured_by' => $this->faker->name,
            'aod' => $this->faker->randomElement(['DXB', 'ADD', 'TNR', 'LAD', 'MGQ', 'JNB']),
            'nop' => $this->faker->numberBetween(1, 4),
            'SHC' => $this->faker->randomElement(['DGR', 'PEP', 'HEA', 'AVI', 'PEF', 'PIL']),
            'weight' => $this->faker->biasedNumberBetween(100, 100),
            'dimensions' => $this->faker->biasedNumberBetween(0, 100) . 'X' . $this->faker->biasedNumberBetween(0, 100) . 'X' . $this->faker->biasedNumberBetween(0, 100),
            'remarks' => $this->faker->sentence(3),
        ];
    }
}
