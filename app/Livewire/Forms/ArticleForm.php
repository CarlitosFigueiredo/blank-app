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

    public array $notifications = [];

    public bool $allowNotification = false;

    public function setArticle(Article $article): void
    {
        $this->article = $article;

        $this->title = $this->article->title;
        $this->content = $this->article->content;
        $this->published = $this->article->published;
        $this->notifications = $this->article->notifications ?? [];

        $this->allowNotification = count($this->notifications) > 0;
    }

    public function store(): void
    {
        $this->validate();

        if (!$this->allowNotification) {

            $this->notifications = [];
        }

        Article::create($this->only(['title', 'content', 'published', 'notifications']));
    }

    public function update(): void
    {
        $this->validate();

        if (!$this->allowNotification) {

            $this->notifications = [];
        }

        $this->article->update($this->only(['title', 'content', 'published', 'notifications']));
    }
}
