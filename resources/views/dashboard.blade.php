<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold m-0">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-6 text-center">
                        <img src="{{ asset('img/undraw_profile_2.svg') }}" style="width: 180px">
                        <p>{{ auth()->user()->name }}</p>
                    </div>
                </div>
                <p class="text-center">Welcome back :D</p>
            </div>
        </div>
    </div>
</x-app-layout>
