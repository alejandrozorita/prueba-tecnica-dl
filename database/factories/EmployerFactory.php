<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Repositories\EmployerRepo;
use Faker\Generator as Faker;

$factory->define(EmployerRepo::class, function (Faker $faker) {
    return [
      'emp_no' => $faker->randomNumber(),
      'birth_date' => $faker->date('Y-m-d'),
      'first_name' => $faker->name,
      'last_name' => $faker->lastName,
      'gender' => ($faker->numberBetween(0, 1) === 0) ? 'M' : 'F',
      'hire_date' => $faker->date('Y-m-d'),
    ];
});
