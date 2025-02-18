<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Log;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateArticleForm extends Component
{
    use WithFileUploads;

    #[Validate(as: 'title')]
    public $title;

    #[Validate(as: 'descrizione')]
    public $description;


    #[Validate(as: 'prezzo')]
    public $price;


    #[Validate(as: 'categoria')]
    public $category;

    #[Validate(as: 'Immagini')]
    public $images = [];
    #[Validate(as: 'immagine temporanea')]
    public $temporary_images;

    public $article;

    protected $rules = [
        'title' => 'required|max:30|min:5',
        'description' => 'required|max:255|min:5',
        'price' => 'required|numeric',
        'category' => 'required',
    ];

    /*protected $messages = [
        '*.required' => 'Per favore, inserisci :attribute.',
        '*.min' => ':attribute deve avere almeno :min caratteri',
        '*.max' => ':attribute non può superare :max caratteri.',
        '*.numeric' => 'Per favore, inserisci un numero'
    ];*/


    public function updatedTemporaryImages()
    {
        // Verifica che il numero totale di immagini non superi 6
        if (count($this->images) + count($this->temporary_images) > 6) {
            $this->addError('temporary_images',  __('ui.sixMax'));
            return;
        }

        // Valida le immagini temporanee
        $this->validate([
            'temporary_images' => 'array|max:6', // Deve essere un array con massimo 6 elementi
            'temporary_images.*' => 'image|max:1024', // Ogni immagine deve essere valida e non superare 1MB
        ]);

        // Aggiungi le nuove immagini all'array principale
        foreach ($this->temporary_images as $image) {
            array_push($this->images, $image);
        }

        // Svuota l'array temporaneo
        $this->temporary_images = [];
    }


    public function removeImages($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }
    public function save()
    {
        $this->validate();


        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::id()
        ]);
        // Log::info('Images Count:', ['count' => count($this->images)]);
        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);

                RemoveFaces::withChain([

                    new ResizeImage($newImage->path, 300, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }


        $this->reset();
        session()->flash('success',  __('ui.articleCreatedSuccesfully'));
        // $this->cleanForm();

        return redirect()->to('/create/article');
    }
}
