<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold m-0">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            {{-- $access_token dan $message udah include di middleware --}}
            @if (isset($message))
                {{ $message }}
            @endif
            {{-- @livewire('category-select') --}}

            <p>Product disini</p>
            <div>
                <p class="fw-bolder">Table product with getQC</p>
            </div>
        </div>
</x-app-layout>
