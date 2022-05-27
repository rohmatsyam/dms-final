{{-- <x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }} {{ Auth::guard('admin')->user()->name }} - ({{ Auth::guard('admin')->user()->email }})
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-admin-layout> --}}

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
