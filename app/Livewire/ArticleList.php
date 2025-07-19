<?php

namespace App\Livewire;

use App\Models\Article;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Manage Articles')]
class ArticleList extends AdminComponent
{
    use WithPagination;

    public bool $showOnlyPublished = false;

    public function delete(Article $article)
    {
        if ($this->articles->count() < 10) {
            throw new Exception('Nope');
        }

        $article->delete();

        unset($this->articles);

        cache()->forget('published-count');
    }

    public function showAll(): void
    {
        $this->showOnlyPublished = false;
        $this->resetPage(pageName: 'articles-page');
    }

    public function showPublished(): void
    {
        $this->showOnlyPublished = true;
        $this->resetPage(pageName: 'articles-page');
    }

    public function render(): View
    {
        return view('livewire.article-list');
    }

    #[Computed(persist: true)]
    protected function articles(): LengthAwarePaginator
    {
        $query = Article::query();

        if ($this->showOnlyPublished) {
            $query->where('published', 1);
        }

        return  $query->paginate(10, pageName: 'articles-page');
    }
}
