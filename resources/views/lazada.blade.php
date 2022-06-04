<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Lazada') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            <?php var_dump($access_token); ?>
            <?php var_dump($message); ?>
            <form method="GET" action="{{ route('getcategoryattributes') }}">
                @csrf
                <x-label for="categoryattr" :value="__('Masukkan kateori')" />
                <x-input id="categoryattr" type="number" name="categoryattr" required autofocus />
                <x-button>
                    {{ __('Get Category Attributes') }}
                </x-button>
            </form>
            <br>
            <form method="POST" action="{{ route('createproduct') }}">
                @csrf

                <x-input name="accessToken" type="hidden" value="{{ $access_token }}" />
                <x-button>
                    {{ __('Store Product') }}
                </x-button>
            </form>

            {{-- <div class="container">
                <div class="btn-group flex-wrap" role="group" aria-label="Basic outlined example">
                    @foreach ($category as $satu => $item)
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop{{ $satu }}" type="button"
                                class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ $item->name }}
                            </button>
                            @if (isset($item->children))
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop{{ $satu }}">
                                    @foreach ($item->children as $dua => $child)
                                        @if (isset($child->name))
                                            <li><a class="dropdown-item" href="#">
                                                    {{ $child->name }} </a>

                                                @if (isset($child->children))
                                                    <ul class="submenu dropdown-menu">
                                                        @foreach ($child->children as $tiga => $anak)
                                                            @if (isset($anak->name))
                                                                <li><a class="dropdown-item"
                                                                        href="#">{{ $anak->name }}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div> --}}
            <div class="container">
                @livewire('category-select')
            </div>
</x-app-layout>
