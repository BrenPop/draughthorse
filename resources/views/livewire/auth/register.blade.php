<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create a Draught Horse account')" :description="__('Select which type of account you want to register')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    {{-- Create two buttons to RegisterUser and RegisterBar --}}
    <div class="flex flex-col gap-4">
        <flux:button wire:click="registerPatron" variant="primary" class="w-full">
            {{ __('Register as a Patron') }}
        </flux:button>
        <flux:button wire:click="registerBar" variant="primary" class="w-full">
            {{ __('Register as a Bar') }}
        </flux:button>
    </div>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>
