<?php

namespace App\Livewire\Auth;

use App\Models\UserType;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public function registerUser()
    {
        $patronUserType = UserType::where('slug', 'patron')->first();
        
        return redirect()->route('register.user', ['userTypeId' => $patronUserType->id]);
    }

    public function registerBar()
    {
        return redirect()->route('register.bar');
    }
}
