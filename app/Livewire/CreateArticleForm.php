<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CreateArticleForm extends Component
{
    use WithFileUploads; // Consente il caricamento dei file

    // Dichiarazione delle proprietà con validazione
    #[Validate('required|min:3')]
    public $title;

    #[Validate('required|min:10')]
    public $description;

    #[Validate('required|numeric')]
    public $price;

    #[Validate('required')]
    public $category;

    public $article;
    public $images = [];
    public $temporary_images = [];

    /**
     * Salva l'articolo e le immagini nel database
     */
    public function save()
    {
        $this->validate();

        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::id(),
        ]);

        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";

                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                new ResizeImage($newImage->path, 300, 300),
                new GoogleVisionSafeSearch($newImage->id),
                new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id);
            }
            // Correzione esatta del typo
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        session()->flash('success', __('ui.announcement_published'));
        $this->cleanForm();
    }

    /**
     * Aggiorna le immagini temporanee per l'anteprima
     */
    public function updatedTemporaryImages()
    {
        $this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images' => 'max:6',
        ]);

        foreach ($this->temporary_images as $image) {
            if (!in_array($image, $this->images)) {
                $this->images[] = $image; // Popoliamo `$images` con i file caricati
            }
        }
    }

    /**
     * Rimuove un'immagine dall'anteprima
     */
    public function removeImage($key)
    {
        if (isset($this->images[$key])) {
            unset($this->images[$key]); // Rimuovi l'immagine
            $this->images = array_values($this->images); // Riordina l'array
        }
    }

    /**
     * Resetta i campi del form
     */
    protected function cleanForm()
    {
        $this->title = '';
        $this->description = '';
        $this->category = '';
        $this->price = '';
        $this->images = [];
        $this->temporary_images = [];
    }

    /**
     * Rende il componente Livewire nel frontend
     */
    public function render()
    {
        return view('livewire.create-article-form');
    }
}
