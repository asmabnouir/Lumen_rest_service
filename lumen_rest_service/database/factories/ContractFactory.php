<?php

namespace Database\Factories;

use App\Models\Contract;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    protected $model = Contract::class;

    public function definition(): array
    {
    	return [
            'energy' => $this->faker->word,
            'product' => $this->faker->word,
            'gsrn' => $this->faker->word,
            'duration'=>$this->faker->number,
            'codePromo'=> $this->faker->word  
    	    //
    	];
    }
}
