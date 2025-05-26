<?php

namespace App\Livewire;

use App\Models\Greeting;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class Greeter extends Component
{
    public string $name = '';
    public Collection $greetings;
    public string $greeting = '';
    public string $greetingMessage = '';

    public function mount(): void
    {
        $this->greetings = Greeting::all();
    }

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


    public function updatedName(string $value): void
    {
        $this->name = strtolower($value);
    }

    public function render(): View
    {
        return view('livewire.greeter');
    }
}
