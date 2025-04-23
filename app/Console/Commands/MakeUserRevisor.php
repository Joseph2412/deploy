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
    protected $signature = 'app:make-user-revisor {email}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rende un utente revisore';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();  // effettuiamo la ricerca dell'utente associato all'email

        if (!$user) {
            $this->error('Utente non trovato');  //  in caso di mancata corrispondenza messaggio di errore
            return;
        }
        $user->is_revisor = true;
        $user->save();
        $this->info("l'utente {$user->name} e ora revisore "); // se l'utente viene trovato viene aggiornato conferendogli lo stato di revisore
    }
}
