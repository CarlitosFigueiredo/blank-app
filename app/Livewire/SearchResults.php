<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class SearchResults extends Component
{
    #[Reactive]
    public $results = [];

    #[Reactive]
    public $show = [];

    public function render(): View
    {
        return view('livewire.search-results');
    }
}
