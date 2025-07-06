<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use App\Models\Article;
use Illuminate\View\View;

class EditArticle extends AdminComponent
{
    public ArticleForm $form;

    public function mount(Article $article): void
    {
        $this->form->setArticle($article);
    }

    public function save(): void
    {
        $this->form->update();

        $this->redirect('/dashboard/articles', navigate: true);
    }

    public function render(): View
    {
        return view('livewire.edit-article');
    }
}
