<x-admin-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
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
                        <th scope="col">Edit</th>
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
                                <a href="{{ route('admins.show', ['admin' => $admin]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30px"
                                        height="30px">
                                        <path
                                            d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z" />
                                    </svg>
                                </a>
                            </td>
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
