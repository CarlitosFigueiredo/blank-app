<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Articles')]
class ArticleIndex extends Component
{
    public function render(): View
    {
        return view('livewire.article-index', [
            'articles' => Article::all()
        ]);
    }
}
