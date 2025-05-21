<?php

namespace App\Livewire\Auth;

use App\Models\BarType;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class RegisterBar extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public string $bar_name = '';

    public $description = '';

    public $profile_image = '';

    public $cover_image = '';

    public $address_line_one = '';

    public $address_line_two = '';

    public $address_line_three = '';

    public $city = '';

    public $province = '';

    public $country = '';

    public $postal_code = '';

    public $bar_type = '';

    public $bar_types = [];

    public $selectedProvince = null;

    public $provinces = [];

    public $cities = [];

    public function mount()
    {
        $this->bar_types = BarType::all();
        $this->provinces = Country::where('cca2', 'ZA')
            ->first()
            ->provinces()
            ->get();
    }

    public function render()
    {
        return view('livewire.auth.register-bar', [
            'barTypes' => $this->bar_types,
            'provinces' => $this->provinces,
        ]);
    }

    public function registerBar()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }

    public function updatedSelectedProvince($value)
    {
        logger('Province changed to: ' . $value); // Check your logs
        $this->cities = City::where('province_id', $value)->orderBy('name')->get();
    }
}
