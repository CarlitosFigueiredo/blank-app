<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use Illuminate\View\View;
use Livewire\WithFileUploads;

class CreateArticle extends AdminComponent
{
    use WithFileUploads;

    public ArticleForm $form;

    public function save(): void
    {
        $this->form->store();

        $this->redirectRoute('dashbord.articles.index', navigate: true);
    }

    public function render(): View
    {
        return view('livewire.create-article');
    }
}
