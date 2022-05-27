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
            <h4 class="alert-heading">Whoops! Something went wrong.</h4>
            <hr>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
