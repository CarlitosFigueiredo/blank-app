<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Search extends Component
{
    #[Validate('required')]
    #[Validate('min:3')]
    public string $searchText = '';

    public string $placeholder = '';

    public $results = [];

    public function updatedSearchText($value)
    {
        $this->reset('results');

        $this->validate();

        $searchTerm = "%{$value}%";

        $this->results = Article::where('title', 'LIKE', $searchTerm)->get();
    }

    #[On('search:clear-results')]
    public function clear()
    {
        $this->reset('results', 'searchText');
    }

    public function render(): View
    {
        return view('livewire.search');
    }
}
