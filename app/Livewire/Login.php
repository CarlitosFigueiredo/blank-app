<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Login')]
class Login extends Component
{
    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required')]
    public string $password = '';

    public string $loginMessage = '';

    public function authenticate()
    {
        $this->validate();

        $valid = Auth::attempt(['email' => $this->email, 'password' => $this->password]);

        if ($valid) {

            $this->redirectIntended('/dashboard');
        } else {
            $this->loginMessage = 'Incorrect email and/or password';
        }
    }

    public function render(): View
    {
        return view('livewire.login');
    }
}
