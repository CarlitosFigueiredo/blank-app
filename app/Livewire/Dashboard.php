<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Title;

#[Title('Admin Dashbord')]
class Dashboard extends AdminComponent
{
    public function render(): View
    {
        return view('livewire.dashboard');
    }
}
