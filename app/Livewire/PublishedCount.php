<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class PublishedCount extends Component
{
    public int $count = 0;

    public function mount(): void
    {
        sleep(3);

        $this->count = Article::where('published', 1)->count();
    }

    public function render(): View
    {
        return view('livewire.published-count');
    }

    public function placeholder(): View
    {
        return view('livewire.placeholder', [
            'message' => 'Published count is loading.'
        ]);
    }
}
