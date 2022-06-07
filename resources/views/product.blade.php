<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold m-0">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            {{-- $access_token dan $message udah include di middleware --}}
            @if (isset($message))
                {{ $message }}
            @endif
            {{-- @livewire('category-select') --}}

            <p>Product disini</p>
            <div>
                <p class="fw-bolder">Table product with getQC</p>
                <h2 class="fw-bolder text-center">Product Masuk</h2>
                <div class="row">
                    <div class="col-sm-8 mx-auto">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">item_id</th>
                                    <th scope="col">seller_sku</th>
                                    <th scope="col">sku_id</th>
                                    <th scope="col">Check status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <th scope="row">
                                            {{ $key }}
                                        </th>
                                        <td>{{ $product->item_id }}</td>
                                        <td>{{ $product->seller_sku }}</td>
                                        <td>{{ $product->sku_id }}</td>
                                        <td>
                                            {{-- <form action="{{ route('admins.destroy', ['admin' => $admin]) }}" method="GET"> --}}
                                            <form action="{{ route('getqc') }}" method="POST">
                                                @csrf
                                                <input name="accessToken" type="hidden" value="{{ $access_token }}">
                                                <input name="seller_skus" type="hidden"
                                                    value="{{ $product->seller_sku }}">
                                                <button type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                        width="30px" height="30px">
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
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
