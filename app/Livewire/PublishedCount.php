<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy(Isolate: false)]
class PublishedCount extends Component
{
    // public int $count = 0;
    public string $placeholderText = '';

    #[Computed(cache: true, key: 'published-count')]
    protected function count(): int
    {
        sleep(1);

        return Article::where('published', 1)->count();
    }

    public function render(): View
    {
        return view('livewire.published-count');
    }

    public function placeholder(): View
    {
        return view('livewire.placeholder', [
            'message' => $this->placeholderText,
        ]);
    }
}
