<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ArticleForm extends Form
{
    public ?Article $article;

    #[Locked]
    public int $id = 0;

    #[Rule('required')]
    public string $title = '';

    #[Rule('required')]
    public string $content = '';

    public bool $published = false;
    public array $notifications = [];
    public bool $allowNotification = false;

    #[Rule('image|max:1024')]
    public $photo;
    public $photo_path = '';

    public function setArticle(Article $article): void
    {
        $this->article = $article;

        $this->id = $this->article->id;
        $this->title = $this->article->title;
        $this->content = $this->article->content;
        $this->published = $this->article->published;
        $this->notifications = $this->article->notifications ?? [];
        $this->photo_path = $article->photo_path;

        $this->allowNotification = count($this->notifications) > 0;

    }

    public function store(): void
    {
        $this->validate();

        if ($this->photo) {

            $this->photo_path = $this->photo->storePublicly('article_photos', ['disk' => 'public']);
        }

        if (!$this->allowNotification) {

            $this->notifications = [];
        }

        Article::create($this->only(['title', 'content', 'published', 'notifications', 'photo_path']));

        cache()->forget('published-count');
    }

    public function update(): void
    {
        $this->validate();

        if ($this->photo) {

            $this->photo_path = $this->photo->storePublicly('article_photos', ['disk' => 'public']);
        }

        if (!$this->allowNotification) {

            $this->notifications = [];
        }

        $this->article->update($this->only(['title', 'content', 'published', 'notifications', 'photo_path']));

        cache()->forget('published-count');
    }
}
