<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold m-0">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            @if ($pesan = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="btn-close" data-dismiss="alert">x</button>
                    <strong>{{ $pesan }}</strong>
                </div>
            @endif
            <h4 class="text-center fw-bold">{{ $productName }}</h2>
                @livewire('create-product')
        </div>
</x-app-layout>
