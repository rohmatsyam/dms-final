<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            @livewire('create-product')
        </div>
        {{-- <form method="POST" action="{{ route('createproduct') }}">
                @csrf
                <x-input name="accessToken" type="hidden" value="{{ $access_token }}" />
                <x-button>
                    {{ __('Store Product') }}
                </x-button>
            </form> --}}
</x-app-layout>
