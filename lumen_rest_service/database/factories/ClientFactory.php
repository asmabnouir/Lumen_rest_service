<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    protected $model = \App\Models\Client::class;
  

    public function definition(): array
    {
    	return [
            'firstName' => $this->faker->name,
            'lastName' => $this->faker->name,
            'street' => $this->faker->sentence,
            'number' => $this->faker->sentence,
            'zip'=>$this->faker->phoneNumber,
            'city'=> $this->faker->word  
    	    //
    	];
    }
}
