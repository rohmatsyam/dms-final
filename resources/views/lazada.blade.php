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



            @foreach ($category as $key => $cat)
                {{-- {{ var_dump($cat) }} --}}
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $cat->name }}
                    </button>
                    {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach ($cat->$children as $i => $item)
                            <a class="dropdown-item" href="#">Action</a>                            
                        @endforeach
                    </div> --}}
                </div>                
                {{-- {{ dd(is_array($cat->children)) }} --}}
            @endforeach

        </div>
    </div>
</x-app-layout>
