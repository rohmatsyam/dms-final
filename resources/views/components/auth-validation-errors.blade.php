@props(['errors'])

@if ($errors->any())
    {{-- <div {!! $attributes->merge(['class' => 'alert alert-danger']) !!} role="alert">
        <div class="text-danger">{{ __('Whoops! Something went wrong.') }}</div>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> --}}

    <div {{ $attributes }}>
        <div class="alert alert-danger" role="alert">
            <h5 class="alert-heading p-0">Terjadi kesalahan</h4>
                <hr class="mx-1">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
        </div>
    </div>
@endif
