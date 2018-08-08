<?php

use Faker\Generator as Faker;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
        'slug' => $faker->unique()->slug,
        'name' => $faker->sentence,
        'summary' => $faker->catchPhrase,
        'description' => $faker->text,
        'website'=> $faker->domainName,
        'icon' => $faker->imageUrl(200, 200, 'food')
    ];
});
