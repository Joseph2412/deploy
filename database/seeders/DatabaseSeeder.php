<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Article;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
        public $categories = [

            'Artigianato',
            'Elettronica',
            'Abbigliamento',
            'Casa',
            'Giardinaggio',
            'Giocattoli',
            'Sport',
            'Animali',
            'Libri',
            'Musica',
        ];

        protected $fillable = [
            'title', 'description', 'price', 'category_id', 'user_id', 'is_accepted'
        ];

    public function run(): void
    {
        // User::factory(10)->create();

        foreach($this->categories as $category){
            Category::create([
                'name' => $category
            ]);
        }

        Article::factory(30)->create();

        
    }
}

