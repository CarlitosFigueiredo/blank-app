<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\View\View;
use Livewire\Attributes\Title;

#[Title('Manage Articles')]
class ArticleList extends AdminComponent
{
    public function delete(Article $article)
    {
        $article->delete();
    }

    public function render(): View
    {
        return view('livewire.article-list', [
            'articles' => Article::all(),
        ]);
    }
}
