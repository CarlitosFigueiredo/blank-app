<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class ArticleIndex extends Component
{
    public Collection $articles;

    public function render(): View
    {
        return view('livewire.article-index', [
            'articles' => Article::all(),
        ]);
    }
}
