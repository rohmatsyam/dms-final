<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold m-0">
            {{ __('Lazada') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            {{-- $access_token dan $message udah include di middleware --}}
            @if ($pesan = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="btn-close" data-dismiss="alert">x</button>
                    <strong>{{ $pesan }}</strong>
                </div>
            @endif
            @if (isset($message))
                <div class="row justify-content-center">
                    <div class="col-sm-6 card text-center rounded shadow-sm p-0">
                        <div class="card-header bg-info text-dark">
                            Message
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $message }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @livewire('category-select')
        </div>
</x-app-layout>
