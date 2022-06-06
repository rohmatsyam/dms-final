<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold m-0">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-3" :errors="$errors" />
            <x-auth-validation-success class="mb-3" />

            {{-- Profile will be here --}}
            <form action="{{ route('profile.update') }}" method="POST">
                <div class="container">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <x-label for="name" :value="__('Name')" />
                                <x-input name="name" id="name" class="block mt-1 w-full" type="text"
                                    value="{{ auth()->user()->name }}" autofocus />
                            </div>
                            <div class="mb-3">
                                <x-label for="email" :value="__('Email')" />
                                <x-input name="email" id="email" class="block mt-1 w-full" type="email"
                                    value="{{ auth()->user()->email }}" autofocus />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <x-label for="new_password" :value="__('New password')" />
                                <x-input id="new_password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="new-password" />
                            </div>
                            <div class="mb-3">
                                <x-label for="confirm_password" :value="__('Confirm password')" />
                                <x-input id="confirm_password" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" required autocomplete="confirm-password" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <x-button class="ml-3">{{ __('Update') }}</x-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
