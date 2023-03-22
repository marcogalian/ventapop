<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserAdmin extends Command
{
    
    protected $signature = 'ventapop:makeUserAdmin {email}';
    protected $description = 'Asigna el rol del Admin a un usuario';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        //$email = $this->ask('Introducir el correo del usuario');
        //$user = User::where('email', $email)->first();
        $user = User::where('email', $this->argument('email'))->first();
        if (!$user) {
            $this->error('Usuario no encontrado');
            return;
        }
        $user->is_admin = true;
        $user->save();
        $this->info('El usuario ya se ha convertido en un administrador');
    }
}
