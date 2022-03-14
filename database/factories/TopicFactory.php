<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'topic_name'=>$this->faker->word(2),
            'topic_description'=>$this->faker->sentence(),
            'created_by'=> 'Admin',
            'status'=>'Active',
        ];
    }
}
