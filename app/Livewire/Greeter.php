<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Greeter extends Component
{
    public string $name = '';
    public string $greeting = '';
    public string $greetingMessage = '';

    protected function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:2'
            ]
        ];
    }

    public function changeGreeting(): void
    {
        $this->validate();

        $this->greetingMessage = "{$this->greeting}, {$this->name}!";
    }

    public function render(): View
    {
        return view('livewire.greeter');
    }
}
