<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition(): array
    {
    	return [
            'firstName' => $this->faker->person,
            'lastName' => $this->faker->person,
            'street' => $this->faker->adress,
            'number' => $this->faker->sentence,
            'zip'=>$this->faker->phoneNumber,
            'city'=> $this->faker->word  
    	    //
    	];
    }
}
