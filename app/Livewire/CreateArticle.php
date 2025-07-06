<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use Illuminate\View\View;

class CreateArticle extends AdminComponent
{
    public ArticleForm $form;

    public function save(): void
    {
        $this->form->store();

        $this->redirect('/dashboard/articles', navigate: true);
    }

    public function render(): View
    {
        return view('livewire.create-article');
    }
}
