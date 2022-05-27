<x-admin-layout>
    <x-slot name="header">
        {{-- <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2> --}}
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <img src="{{ asset('img/undraw_profile_2.svg') }}" style="width: 180px">
                <p>{{ auth()->user()->name }}</p>
            </div>
        </div>
    </x-slot>

    <div class="my-4 card">
        <div class="card-body">
            <p class="text-center">Welcome back :D</p>
        </div>
    </div>
</x-admin-layout>
