<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            <h2 class="text-center">{{ $productName }}</h2>
            @livewire('create-product')
        </div>
</x-app-layout>
