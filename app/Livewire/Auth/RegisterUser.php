<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class RegisterUser extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    #[Url]
    public int $userTypeId;

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        try {
            $validated = $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            ]);

            $userData = $validated;
            $userData['password'] = Hash::make($userData['password']);

            // if userTypeId does not exist in the UserTypes table redirect to register page
            $userType = UserType::findOrFail($this->userTypeId);
            
            $userData['user_type_id'] = $this->userTypeId;

            event(new Registered(($user = User::create($userData))));

            Auth::login($user);

            $this->redirect(route('dashboard', absolute: false), navigate: true);
        } catch (\Exception $e) {
            \Log::error($e->getMessage() . "\n"  . $e->getTraceAsString());
            $this->redirect(route('register', absolute: false), navigate: true);
        }
    }
}
