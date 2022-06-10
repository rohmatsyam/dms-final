<x-admin-layout>
    <x-slot name="header">
        <h2 class="fw-bold m-0">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="my-4 card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <img src="{{ asset('img/undraw_profile_2.svg') }}" style="width: 180px">
                    <p>{{ auth()->user()->name }}</p>
                </div>
            </div>
            <p class="text-center">Welcome back :D</p>
        </div>
        <div class="card-body">
            <div class="row justify-content-center text-center">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Admin</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahAdmin }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        User</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahUser }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
