<?php
//TODO:

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'date' => '2022-05-05',
            'location' => $this->faker->city(),
            'email' => $this->faker->companyEmail(),
            'sport' => 'swimming',
            'conditions' => 'girls and boys',
            'max_players' => 10,
            'descriptions' => $this->faker->sentence(),
            'prize' => $this->faker->word(),
            //'winner' => '',
            'website' => 'https://www.cesa.vut.cz/verejnost',
            'approved' => false,
            
        ];
    }
}
