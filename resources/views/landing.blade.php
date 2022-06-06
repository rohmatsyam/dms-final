<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DMs | Landing Page</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>


<body>
    <div class="container">
        {{-- Header --}}
        <header
            class="flex-wrap py-3 mb-4 d-flex align-items-center justify-content-center justify-content-md-between border-bottom">
            <a href="/" class="mb-2 d-flex align-items-center col-md-3 mb-md-0 text-dark text-decoration-none">
                <img src="{{ asset('img/logodms.png') }}" style="height: 40px;  width: 75px;">
            </a>

            <ul class="mb-2 nav col-12 col-md-auto justify-content-center mb-md-0">
                <li><a href="#" class="px-2 nav-link link-secondary">Home</a></li>
                <li><a href="#fitur" class="px-2 nav-link link-dark">Features</a></li>
                <li><a href="#" class="px-2 nav-link link-dark">Pricing</a></li>
                <li><a href="#" class="px-2 nav-link link-dark">FAQs</a></li>
                <li><a href="#about" class="px-2 nav-link link-dark">About</a></li>
            </ul>

            <div class="col-md-3 text-end">
                @if (Route::has('login'))
                    <div>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary me-2">Back to dashboard</a>
                        @else
                            {{-- <a href="{{ route('login') }}" class="text-muted">Log in</a> --}}
                            <a type="button" class="btn btn-outline-primary me-2" href="{{ route('login') }}">Login</a>
                            @if (Route::has('register'))
                                {{-- <a href="{{ route('register') }}" class="ms-4 text-muted">Register</a> --}}
                                <a type="button" class="btn btn-primary" href="{{ route('register') }}">Register</a>
                            @endif
                    @endif
                </div>
                @endif
            </header>

            {{-- End of Header --}}

            <div class="py-5 row flex-lg-row-reverse align-items-center g-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="img/laptop.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" loading="lazy"
                        width="380" height="380">
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-3 display-5 fw-bold lh-1 text-capitalize">Platform omni-channel terpercaya</h1>
                    <p class="lead">Otomasi proses bisnis dari terima pesanan, sinkronisasi stok, integrasi
                        marketplace,
                        aplikasi kasir, jasa pengiriman, hingga pencatatan akuntansi.</p>
                    <div class="gap-2 d-grid d-md-flex justify-content-md-start">
                        {{-- <a type="button" class="btn btn-primary" href="{{ route('register') }}">Register</a> --}}
                        <a type="button" class="px-4 btn btn-primary btn-lg me-md-2" href="{{ route('register') }}">Register</a>
                    </div>
                </div>
            </div>

            {{-- ICON --}}
            {{-- <div class="row"> --}}
            <div class="container">
                <div class="row align-items-center text-center">
                    <div class="col-md-4 themed-grid-col">
                        <img class="mx-auto" src="{{ asset('img/efisien.png') }}"
                            style="height: 90px;  width: 90px;">
                        <h6 class="title mt-3 ">Bisnis Lebih Efisien</h6>
                        <p class="">
                            Kelola bisnis dari semua
                            marketplace dan channel
                            lain dalam satu dashboard.
                        </p>
                    </div>
                    <div class="col-md-4 themed-grid-col">
                        <img class="mx-auto" src="{{ asset('img/pelanggan.png') }}"
                            style="height: 90px;  width: 90px;">
                        <h6 class="title mt-3 ">Kepuasan Pelanggan</h6>
                        <p class="">
                            Pelanggan inti dari segala jenis bisnis.
                            Tingkatkan loyalitas pelanggan dengan DMS.
                        </p>
                    </div>
                    <div class="col-md-4 themed-grid-col">
                        <img class="mx-auto" src="{{ asset('img/risetdata.png') }}"
                            style="height: 90px;  width: 90px;">
                        <h6 class="title mt-3 ">Berbasis Data</h6>
                        <p class="">
                            Pantau seluruh data penjualan dan pelanggan.
                            Buat keputusan terbaik setiap saat.
                        </p>
                    </div>
                </div>
            </div>
            <br><br>

            {{-- Fitur --}}
            <div id="fitur">
                <div class="container text-capitalize">
                    <h4 style="text-align: center; text-transform: uppercase; font-weight: bolder;">Fitur DMS Omni-Channel</h4>

                    <div class="row">
                        <div class="col-md-3 themed-grid-col">
                            <ul class="main-menu">
                                <a class="btn" href="#katalog" style="background-color: #f1f1f1; display: block; font-weight: bolder;">Katalog</a><br>
                                <a class="btn" href="#pesanan" style="background-color: #f1f1f1; display: block; font-weight: bolder;">Pesanan</a><br>
                                <a class="btn" href="#persediaan" style="background-color: #f1f1f1; display: block; font-weight: bolder;">Persediaan</a><br>
                                <a class="btn" href="#gudang" style="background-color: #f1f1f1; display: block; font-weight: bolder;">Managemen Gudang</a><br>
                                <a class="btn" href="#akuntansi" style="background-color: #f1f1f1; display: block; font-weight: bolder;">Akuntansi</a><br>
                            </ul>
                        </div>
                        <div class="col-md-8 themed-grid-col">
                            <div id="katalog">
                                <div class="card card-body" style="color: black;">
                                    <img class="mx-auto" src="{{ asset('img/katalog.png') }}" style="height: 400px;  width: 660px;">
                                </div>
                            </div><br>
                            <div id="pesanan">
                                <div class="card card-body" style="color: black;">
                                    <img class="mx-auto" src="{{ asset('img/pesanan.png') }}" style="height: 400px;  width: 660px;">
                                </div>
                            </div><br>
                            <div id="persediaan">
                                <div class="card card-body" style="color: black;">
                                    <img class="mx-auto" src="{{ asset('img/persediaan.png') }}" style="height: 400px;  width: 660px;">
                                </div>
                            </div><br>
                            <div id="gudang">
                                <div class="card card-body" style="color: black;">
                                    <img class="mx-auto" src="{{ asset('img/gudang.png') }}" style="height: 400px;  width: 660px;">
                                </div>
                            </div><br>
                            <div id="akuntansi">
                                <div class="card card-body" style="color: black;">
                                    <img class="mx-auto" src="{{ asset('img/akuntansi.png') }}" style="height: 400px;  width: 660px;">
                                </div>
                            </div><br>
                        </div>

                    </div>                

                </div>
            </div>

        </div>
    <div id="about"> @include("layouts/footer")</div>
    </body>

    </html>
