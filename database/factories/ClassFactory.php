<?php

use Faker\Generator as Faker;

$factory->define(App\Classes::class, function (Faker $faker) {
    $courses = App\Course::pluck('id');
    $teachers = App\Teacher::pluck('id');

    return [
        'course_id' => $faker->randomElement($courses),
        'period_id' => $faker->randomElement([1,2,3]),
        'teacher_id' => $faker->randomElement($teachers),
        'credit_units' => 3.0,
        'pay_units' => 3.0
    ];
});
