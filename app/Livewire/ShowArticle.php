<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\View\View;
use Livewire\Component;

class ShowArticle extends Component
{
    public Article $article;

    public function mount(Article $article): void
    {
        $this->article = $article;
    }

    public function render(): View
    {
        return view('livewire.show-article');
    }
}
