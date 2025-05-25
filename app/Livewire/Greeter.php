<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Greeter extends Component
{
    public string $name = 'John';

    public function changeName(string $newNanme): void
    {
        $this->name = $newNanme;
    }

    public function render(): View
    {
        return view('livewire.greeter');
    }
}
