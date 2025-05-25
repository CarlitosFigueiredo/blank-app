<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Greeter extends Component
{
    public string $name = '';
    public string $greeting = '';

    public function changeName(): void {}

    public function render(): View
    {
        return view('livewire.greeter');
    }
}
