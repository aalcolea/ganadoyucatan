<?php

require __DIR__.'/vendor/autoload.php';

use App\Models\Persona;

// Obtén el usuario "ganadoyucatan" o crea uno nuevo si no existe
$user = Persona::where('email_user', 'ganadoyucatan')->first();
dd($user);
if (!$user) {
    $user = new Persona();
    $user->email_user = 'ganadoyucatan';
}

// Encripta la contraseña "123456"
$password_bcrypt = bcrypt('123456');

// Asigna la contraseña encriptada al usuario
$user->password = $password_bcrypt;
$user->save();

echo "Contraseña asignada correctamente al usuario 'ganadoyucatan'.";