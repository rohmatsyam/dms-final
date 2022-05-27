@if (session('message'))
    <div {{ $attributes }}>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Success</h4>
            <hr>
            <p>{{ session('message') }}</p>
        </div>
    </div>
@endif
