<x-admin-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ asset('img/logodms.png') }}" style="width: 150px;">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <h2 class="text-4xl font-bold text-center">Admin Register</h2>

        <form method="POST" action="{{ route('admin.register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block w-full mt-1" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="mb-0">
                <div class="d-flex justify-content-end align-items-baseline">
                    <a class="text-muted me-3 text-decoration-none" href="{{ route('admin.login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button>
                        {{ __('Register') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-admin-guest-layout>
