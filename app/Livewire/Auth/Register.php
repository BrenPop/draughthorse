<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public function registerUser()
    {
        return redirect()->route('register.user');
    }

    public function registerBar()
    {
        return redirect()->route('register.bar');
    }
}
