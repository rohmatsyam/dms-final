<x-admin-layout>
    <x-slot name="header">
        <h2 class="fw-bold m-0">
            {{ __('Admins') }}
        </h2>
    </x-slot>

    <div class="my-2 card">
        <div class="card-body">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-3" :errors="$errors" />
            <x-auth-validation-success class="mb-3" />

            <form method="POST" action="{{ route('admins.store') }}">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-6">

                            <!-- Name -->
                            <div class="mb-3">
                                <x-label for="name" :value="__('Name')" />
                                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
                            </div>

                            <!-- Email Address -->
                            <div class="mb-3">
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" type="email" name="email" :value="old('email')" required />
                            </div>

                        </div>
                        <div class="col-6">
                            <!-- Password -->
                            <div class="mb-3">
                                <x-label for="password" :value="__('Password')" />
                                <x-input id="password" type="password" name="password" required
                                    autocomplete="new-password" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-input id="password_confirmation" type="password" name="password_confirmation"
                                    required />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <x-button>
                            {{ __('Store') }}
                        </x-button>
                    </div>
                </div>
            </form>



            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr>
                            <th scope="row">
                                {{ ($admins->currentPage() - 1) * $admins->links()->paginator->perPage() + $loop->iteration }}
                            </th>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                <form action="{{ route('admins.destroy', ['admin' => $admin]) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="30px"
                                            height="30px">
                                            <path
                                                d="M576 384C576 419.3 547.3 448 512 448H205.3C188.3 448 172 441.3 160 429.3L9.372 278.6C3.371 272.6 0 264.5 0 256C0 247.5 3.372 239.4 9.372 233.4L160 82.75C172 70.74 188.3 64 205.3 64H512C547.3 64 576 92.65 576 128V384zM271 208.1L318.1 256L271 303C261.7 312.4 261.7 327.6 271 336.1C280.4 346.3 295.6 346.3 304.1 336.1L352 289.9L399 336.1C408.4 346.3 423.6 346.3 432.1 336.1C442.3 327.6 442.3 312.4 432.1 303L385.9 256L432.1 208.1C442.3 199.6 442.3 184.4 432.1 175C423.6 165.7 408.4 165.7 399 175L352 222.1L304.1 175C295.6 165.7 280.4 165.7 271 175C261.7 184.4 261.7 199.6 271 208.1V208.1z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                <tbody>
            </table>
            <div class="mt-2">
                {{ $admins->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
