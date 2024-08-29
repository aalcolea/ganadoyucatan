<?php

require __DIR__.'/vendor/autoload.php';

use App\Models\Persona;

$user = Persona::where('email_user', 'ganadoyucatan')->first();
dd($user);
if (!$user) {
    $user = new Persona();
    $user->email_user = 'ganadoyucatan';
}

$password_bcrypt = bcrypt('123456');

$user->password = $password_bcrypt;
$user->save();

echo "Contraseña asignada correctamente al usuario 'ganadoyucatan'.";