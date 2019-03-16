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

$factory->define(App\UnayoePerfil::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
        'nombre' => $faker->sentence(2, false),
        'apellido_paterno' => $faker->sentence(1, false),
        'apellido_materno' => $faker->sentence(1, false),
        'profesion' => 'Psicologa',
        'facebook' => 'https://www.facebook.com/LuisYauriMartinez',
        'celular' => $faker->randomNumber($nbDigits = 7),
        'wsp' => $faker->randomNumber($nbDigits = 9),
        'correo' => $faker->unique()->safeEmail,
        'foto' => 'https://images-na.ssl-images-amazon.com/images/I/617VVLMw8QL._SX425_.jpg',
        'auto_descripcion' => $faker->sentence(3, false),
        'id_usuario' => '1',
        'id_facultad' => '1',
    ];
});
