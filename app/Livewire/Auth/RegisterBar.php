<?php

namespace App\Livewire\Auth;

use App\Models\Bar;
use App\Models\BarType;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public $city_id = '';

    public $province_id = '';

    public $country_id = '';

    public $postal_code = '';

    public $bar_type_id;

    public $bar_types = [];

    public $selectedProvince = null;

    public $provinces = [];

    public $cities = [];

    public function mount()
    {
        $this->bar_types = BarType::all();
        $this->country_id = Country::where('cca2', 'ZA')
            ->first()
            ->id;
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

    public function register(): void
    {
        try {
            DB::beginTransaction();

            $validated = $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'string', 'confirmed', Password::defaults()],
                'bar_name' => ['required', 'string', 'max:255'],
                'bar_type_id' => ['required', 'exists:bar_types,id'],
                'description' => ['sometimes', 'string', 'max:255'],
                'profile_image' => ['sometimes', 'string', 'max:255'],
                'cover_image' => ['sometimes', 'string', 'max:255'],
                'address_line_one' => ['required', 'string', 'max:255'],
                'address_line_two' => ['sometimes', 'string', 'max:255'],
                'address_line_three' => ['sometimes', 'string', 'max:255'],
                'city_id' => ['required', 'exists:cities,id'],
                'province_id' => ['required', 'exists:provinces,id'],
                'country_id' => ['required', 'exists:countries,id'],
                'postal_code' => ['required', 'string', 'max:255'],
            ]);

            $validated['password'] = Hash::make($validated['password']);

            $userData = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => $validated['password'],
                'user_type_id' => UserType::where('slug', 'bar-owner')->first()->id,
            ];

            $user = User::create($userData);

            $barData = [
                'bar_name' => $validated['bar_name'],
                'bar_type_id' => $validated['bar_type_id'],
                'description' => $validated['description'],
                'profile_image' => $validated['profile_image'],
                'cover_image' => $validated['cover_image'],
                'address_line_one' => $validated['address_line_one'],
                'address_line_two' => $validated['address_line_two'],
                'address_line_three' => $validated['address_line_three'],
                'city_id' => $validated['city_id'],
                'province_id' => $validated['province_id'],
                'country_id' => $validated['country_id'],
                'postal_code' => $validated['postal_code'],
                'user_id' => $user->id
            ];
            
            $bar = Bar::create($barData);

            event(new Registered(($user)));

            DB::commit();

            Auth::login($user);

            $this->redirect(route('dashboard', absolute: false), navigate: true);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage() . "\n"  . $e->getTraceAsString());
            $this->redirect(route('register.bar', absolute: false), navigate: true);
        }
    }

    public function updatedSelectedProvince($value)
    {
        $this->cities = City::where('province_id', $value)->orderBy('name')->get();
        $this->province_id = $value;
    }
}
