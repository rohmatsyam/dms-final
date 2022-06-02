<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Lazada') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">

            @if (isset($access_token))
                {{ $access_token }}
                <br>
                {{ $message }}
            @else
                <form method="POST" action="{{ route('lazada') }}">
                    @csrf
                    <x-button>
                        {{ __('Integrasi Lazada') }}
                    </x-button>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>
