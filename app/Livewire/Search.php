<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Search extends Component
{
    // #[Url(as: 'q', except: '', history: true)]
    public string $searchText = '';
    public string $placeholder = '';

    #[On('search:clear-results')]
    public function clear()
    {
        $this->reset('searchText');
    }

    protected function queryString(): array
    {
        return [
            'searchText' => [
                'as' => 'q',
                'history' => true,
                'except' => '',
            ]
        ];
    }

    public function render(): View
    {
        return view('livewire.search', [
            'results' => Article::where('title', 'LIKE', '%' . $this->searchText . '%')->get(),
        ]);
    }
}
