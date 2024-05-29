<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newEvent = new Event();
            $newEvent->name = $faker->sentence(4, true);
            $newEvent->responsabile = $faker->sentence(4, true);
            $newEvent->date = $faker->optional()->dateTimeThisYear;
            $newEvent->hour = $faker->optional()->time;
            $newEvent->description = $faker->text(300);
            $newEvent->img = $faker->imageUrl(300, 300, 'jpg');
            $newEvent->save();
        }
    }
}
