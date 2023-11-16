<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Persona;

class CambiarRolUser extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
   
     protected $signature = 'cambiar-rol:usuarios';

    /**
     * The console command description.
     *
     * @var string
     */
   protected $description = 'Cambiar el rol de usuarios después de 14 días de registro';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $usuarios = Persona::where('rolid', 6)->where('updated_at', '<=', now()->subDays(31))->get();
        foreach ($usuarios as $usuario) {
            $usuario->update(['rolid' => 0]);
        }
        $this->info('Roles de usuarios actualizados con éxito.');
    }

}
