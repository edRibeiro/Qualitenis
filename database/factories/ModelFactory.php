<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
       
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Tenista::class, function (Faker\Generator $faker) {
    //dd($faker->userName);
    return [
        'nome' => $faker->name,
        'login' => $faker->userName,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'telefone' => $faker->e164PhoneNumber,
        'datadenascimento' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'sexo' => 'M',
        'cidade_id' => '6768',
        'classe_id' => '3',
        'statustenista_id' => '1',
        'academia_id' => '1',
        'activated' => '1',
        'remember_token' => str_random(10),
    ];
});
