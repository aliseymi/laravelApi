<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Episode;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = User::factory()->create();
        Course::factory(5)->create(['user_id' => $user->id])->each(function ($course) {
            Episode::factory(rand(6, 20))->make()->each(function ($episode, $key) use ($course) {
                $episode->number = $key + 1;
                $course->episodes()->save($episode);
            });
        });
    }
}
