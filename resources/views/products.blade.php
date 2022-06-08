<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold m-0">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            {{-- $access_token dan $message udah include di middleware --}}
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="btn-close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="btn-close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div>
                <h2 class="fw-bolder text-center">All Products</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Category</th>
                                                <th>SKU ID</th>
                                                <th>Nama</th>
                                                <th>Brand</th>
                                                <th>Jumlah</th>
                                                <th>Lebar</th>
                                                <th>Tinggi</th>
                                                <th>Panjang</th>
                                                <th>Berat</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                                <th>Deactivate</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $key => $product)
                                                <tr>
                                                    <th scope="row">
                                                        {{ $key + 1 }}
                                                    </th>
                                                    <td>{{ $product->item_id }}</td>
                                                    <td>{{ $product->primary_category }}</td>
                                                    <td>{{ $product->skus[0]->SkuId }}</td>
                                                    <td>{{ $product->attributes->name }}</td>
                                                    <td>{{ $product->attributes->brand }}</td>
                                                    <td>{{ $product->skus[0]->quantity }}</td>
                                                    <td>{{ $product->skus[0]->package_width }}</td>
                                                    <td>{{ $product->skus[0]->package_height }}</td>
                                                    <td>{{ $product->skus[0]->package_length }}</td>
                                                    <td>{{ $product->skus[0]->package_weight }}</td>
                                                    <td>{{ $product->skus[0]->price }}</td>
                                                    <td>{{ $product->status }}</td>
                                                    <td>
                                                        {{-- deactivate --}}
                                                        <form action="{{ route('deactivateproduct') }}" method="POST"
                                                            class="form-group">
                                                            @csrf
                                                            <input name="item_id" type="hidden"
                                                                value="{{ $product->item_id }}">
                                                            <button type="submit">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 576 512" width="30px" height="30px">
                                                                    <path
                                                                        d="M576 384C576 419.3 547.3 448 512 448H205.3C188.3 448 172 441.3 160 429.3L9.372 278.6C3.371 272.6 0 264.5 0 256C0 247.5 3.372 239.4 9.372 233.4L160 82.75C172 70.74 188.3 64 205.3 64H512C547.3 64 576 92.65 576 128V384zM271 208.1L318.1 256L271 303C261.7 312.4 261.7 327.6 271 336.1C280.4 346.3 295.6 346.3 304.1 336.1L352 289.9L399 336.1C408.4 346.3 423.6 346.3 432.1 336.1C442.3 327.6 442.3 312.4 432.1 303L385.9 256L432.1 208.1C442.3 199.6 442.3 184.4 432.1 175C423.6 165.7 408.4 165.7 399 175L352 222.1L304.1 175C295.6 165.7 280.4 165.7 271 175C261.7 184.4 261.7 199.6 271 208.1V208.1z" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        {{-- delete --}}
                                                        <form action="{{ route('deleteproduct') }}" method="POST"
                                                            class="form-group">
                                                            @csrf
                                                            <input name="item_id" type="hidden"
                                                                value="{{ $product->item_id }}">
                                                            <input name="sku_id" type="hidden"
                                                                value="{{ $product->skus[0]->SkuId }}">
                                                            <button type="submit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                                    height="30" fill="currentColor"
                                                                    class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
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
                </div>
            </div>
        </div>
</x-app-layout>
