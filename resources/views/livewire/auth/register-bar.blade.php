<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Draught Horse Bar')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Bar Owner Column -->
            <div class="flex flex-col gap-6">
                <h2 class="text-lg font-semibold">{{ __('Bar Owner') }}</h2>
                <!-- Name -->
                <flux:input
                    wire:model="name"
                    :label="__('Name')"
                    type="text"
                    autofocus
                    autocomplete="name"
                    :placeholder="__('Full name')"
                />

                <!-- Email Address -->
                <flux:input
                    wire:model="email"
                    :label="__('Email address')"
                    type="email"
                    autocomplete="email"
                    placeholder="email@example.com"
                />

                <!-- Password -->
                <flux:input
                    wire:model="password"
                    :label="__('Password')"
                    type="password"
                    autocomplete="new-password"
                    :placeholder="__('Password')"
                    viewable
                />

                <!-- Confirm Password -->
                <flux:input
                    wire:model="password_confirmation"
                    :label="__('Confirm password')"
                    type="password"
                    autocomplete="new-password"
                    :placeholder="__('Confirm password')"
                    viewable
                />
            </div>

            <!-- Bar Details Column -->
            <div class="flex flex-col gap-6">
                <h2 class="text-lg font-semibold">{{ __('Bar Details') }}</h2>

                <!-- Bar Name -->
                <flux:input
                    wire:model="bar_name"
                    :label="__('Bar Name')"
                    type="text"
                    autofocus
                    autocomplete="bar_name"
                    :placeholder="__('Bar name')"
                />

                <flux:select wire:model="bar_type_id" :label="__('Bar Type')" id="bar_type_id">
                    <option value="" selected disabled>{{ __('Select Bar Type') }}</option>
                    @foreach ($barTypes as $barType)
                        <option value="{{ $barType->id }}">{{ $barType->name }}</option>
                    @endforeach
                </flux:select>

                <flux:input
                    wire:model="address_line_one"
                    :label="__('Address Line One')"
                    type="text"
                    autofocus
                    autocomplete="address_line_one"
                    :placeholder="__('Address line one')"
                />

                <flux:input
                    wire:model="address_line_two"
                    :label="__('Address Line Two')"
                    type="text"
                    autofocus
                    autocomplete="address_line_two"
                    :placeholder="__('Address line two')"
                />

                <flux:input
                    wire:model="address_line_three"
                    :label="__('Address Line Three')"
                    type="text"
                    autofocus
                    autocomplete="address_line_three"
                    :placeholder="__('Address line three')"
                />

                <flux:input
                    wire:model="postal_code"
                    :label="__('Postal Code')"
                    type="text"
                    autofocus
                    autocomplete="postal_code"
                    :placeholder="__('Postal code')"
                />

                <flux:select wire:model.lazy="selectedProvince" :label="__('Province')" id="province_id">
                    <option value="" selected disabled>{{ __('Select province') }}</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                </flux:select>

                <flux:select wire:model="city_id" :label="__('City')" id="city_id">
                    <option value="" selected disabled>{{ __('Select city') }}</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </flux:select>
            </div>
        </div>

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>
