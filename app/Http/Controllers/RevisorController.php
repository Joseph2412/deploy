<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    // Metodo per visualizzare il primo articolo non accettato
    public function index() 
    {
        
            // Recupera tutti gli articoli non ancora accettati e ordina per data di creazione (decrescente)
            $articles_to_check = Article::where('is_accepted', null)
                ->orderBy('created_at', 'desc') // Ordinamento prima di ottenere i risultati
                ->get();
            
            // Restituisci la vista con gli articoli
            return view('revisor.index', [
                'articles_to_check' => $articles_to_check,
                'message' => $articles_to_check->isEmpty() ? __('messages.no_articles_to_review') : null
            ]);
        
    }

    // Metodo per accettare un articolo
    public function accept(Article $article)
    {
        $article->setAccepted(true);

        // Redirige indietro con un messaggio di conferma
        return redirect()->back()->with('message', __('ui.article_accepted', ['title' => $article->title]));

    }

    // Metodo per rifiutare un articolo
    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()->back()->with('message', __('ui.article_rejected', ['title' => $article->title]));
    }

    // Metodo per richiedere di diventare revisore
    public function becomeRevisor()
    {       
            // Invia l'email per la richiesta di revisore
            Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
    
            // Redirige alla pagina about.revisor con un messaggio di conferma
            return redirect()->route('about.revisor')->with('message', __('ui.requested_to_become_revisor'));
            
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }
}
