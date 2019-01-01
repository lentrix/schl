<?php

use Faker\Generator as Faker;

$factory->define(App\Teacher::class, function (Faker $faker) {
    return [
        'lname' => $faker->lastName,
        'fname' => $faker->firstName,
        'mname' => $faker->lastName,
        'title' => (['Dr.','Tch.','Dean','Tch.','Tch.','Tch.'])[rand(0,5)],
        'specialty' => (['English','Filipino','Mathematics','Sciences','Research','Politics','Geography','Computing'])[rand(0,7)],
    ];
});
