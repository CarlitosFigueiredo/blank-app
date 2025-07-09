<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ArticleForm extends Form
{
    public ?Article $article;

    #[Rule('required')]
    public string $title = '';

    #[Rule('required')]
    public string $content = '';

    public bool $published = false;

    public string $notification = 'none';

    public function setArticle(Article $article): void
    {
        $this->article = $article;

        $this->title = $this->article->title;
        $this->content = $this->article->content;
        $this->published = $this->article->published;
        $this->notification = $this->article->notification;
    }

    public function store(): void
    {
        $this->validate();

        Article::create($this->only(['title', 'content', 'published', 'notification']));
    }

    public function update(): void
    {
        $this->validate();

        $this->article->update($this->only(['title', 'content', 'published', 'notification']));
    }
}
