<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Lazada') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            <form method="POST" action="{{ route('lazop') }}">
                @csrf
                <x-button>
                    {{ __('Integrasi Lazada') }}
                </x-button>
            </form>
        </div>
    </div>
</x-app-layout>
