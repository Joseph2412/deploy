<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Http\Request;

class ArticleController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['create']),
        ];
    }

    public function create()
    {
        return view('article.create');
    }

    public function show(Article $article)
    {
        $articles = Article::inRandomOrder()->take(4)->get();

        return view('article.show', compact('article', 'articles'));
    }

    public function homepage()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
        return view('welcome', compact('articles'));
    }

    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(24);
        return view('article.index', compact('articles'));
    }

    public function byCategory($name)
    {
        // Cerca la categoria usando il nome
        $category = Category::where('name', $name)->firstOrFail();

        // Recupera solo gli articoli accettati
        $articles = $category->articles()->where('is_accepted', true)->get();

        return view('article.byCategory', compact('articles', 'category'));
    }
}
