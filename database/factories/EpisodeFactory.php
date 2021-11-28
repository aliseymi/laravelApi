<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(5),
            'videoUrl' => 'http://clips.vorwaerts-gmbh.de/VfE_html5.mp4'
        ];
    }
}
