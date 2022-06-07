<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold m-0">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            <h4 class="text-center fw-bold">{{ $productName }}</h2>
                @livewire('create-product')
        </div>
</x-app-layout>
