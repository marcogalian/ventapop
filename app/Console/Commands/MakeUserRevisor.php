<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;


class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ventapop:makeUserRevisor {email}';
    protected $description = 'Asigna el rol del revisor a un usuario';

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //$email = $this->ask('Introducir el correo del usuario');
        //$user = User::where('email', $email)->first();
        $user = User::where('email', $this->argument('email'))->first();
        if (!$user) {
            $this->error('Usuario no encontrado');
            return;
        }
        $user->is_revisor = true;
        $user->save();
        $this->info('El usuario $user->name ya se ha convertido en un revisor');
    }
}
