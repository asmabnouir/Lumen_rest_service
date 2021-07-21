<?php

namespace Database\Factories;

use App\Models\Contract;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContractFactory extends Factory
{
    protected $model = \App\Models\Contract::class;

    public function definition(): array
    {
    	return [
            'energy' => $this->faker->word,
            'client_id'=> $this->faker->id,
            'product' => $this->faker->word,
            'gsrn' => $this->faker->word,
            'duration'=>$this->faker->number,
            'codePromo'=> $this->faker->word  
    	    //
    	];
    }
}
