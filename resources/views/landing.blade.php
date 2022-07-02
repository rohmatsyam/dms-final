<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DMs | Landing Page</title>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/footer.css') }}" rel="stylesheet">
</head>

<body style="background-color:#FFFFFF;">
    <div class="container-md">
        {{-- Header --}}
        <header
            class="flex-wrap py-3 mb-2 d-flex align-items-center justify-content-center justify-content-md-between border-bottom sticky-top bg-white">
            <a href="/" class="mb-2 d-flex align-items-center col-md-3 mb-md-0 text-dark text-decoration-none">
                <img src="{{ asset('img/logodms.png') }}" style="height: 40px;  width: 75px;" alt="logo"
                    loading="lazy">
            </a>

            <ul class="mb-2 nav col-12 col-md-auto justify-content-center mb-md-0">
                <li><a href="/" class="px-2 nav-link link-secondary">Home</a></li>
                <li><a href="#features" class="px-2 nav-link link-dark">Features</a></li>
                <li><a href="#faq" class="px-2 nav-link link-dark">FAQs</a></li>
                <li><a href="#about" class="px-2 nav-link link-dark">About</a></li>
            </ul>

            <div class="col-md-3 text-end">
                @if (Route::has('login'))
                    <div>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary me-2">Back to dashboard</a>
                        @else
                            <a type="button" class="btn btn-outline-primary me-2" href="{{ route('login') }}">Login</a>
                            @if (Route::has('register'))
                                <a type="button" class="btn btn-primary" href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                @endif
            </div>
        </header>
        {{-- End of Header --}}

        {{-- Hero section --}}
        <div class="row flex-lg-row-reverse align-items-center g-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{ asset('img/laptop.png') }}" class="d-block mx-lg-auto img-fluid" alt="Loading"
                    loading="lazy" width="380" height="380">
            </div>
            <div class="col-lg-6">
                <h1 class="mb-3 display-5 fw-bold lh-1 text-capitalize">Platform omni-channel terpercaya</h1>
                <p class="lead">Otomasi proses bisnis dari terima pesanan, sinkronisasi stok, integrasi
                    marketplace,
                    aplikasi kasir, jasa pengiriman, hingga pencatatan akuntansi.</p>
                <div class="gap-2 d-grid d-md-flex justify-content-md-start">
                    <a type="button" class="px-4 btn btn-primary btn-lg me-md-2" href="/api/register">Register</a>
                </div>
            </div>
        </div>


        {{-- ICON --}}
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-md-4 themed-grid-col">
                    <img class="mx-auto" src="{{ asset('img/efisien.png') }}" style="height: 90px;  width: 90px;"
                        alt="Efisien" loading="lazy">
                    <h6 class="title mt-3 ">Bisnis Lebih Efisien</h6>
                    <p class="">
                        Kelola bisnis dari semua
                        marketplace dan channel
                        lain dalam satu dashboard.
                    </p>
                </div>
                <div class="col-md-4 themed-grid-col">
                    <img class="mx-auto" src="{{ asset('img/pelanggan.png') }}" style="height: 90px;  width: 90px;"
                        alt="Kepuasan pelanggan" loading="lazy">
                    <h6 class="title mt-3 ">Kepuasan Pelanggan</h6>
                    <p class="">
                        Pelanggan inti dari segala jenis bisnis.
                        Tingkatkan loyalitas pelanggan dengan DMS.
                    </p>
                </div>
                <div class="col-md-4 themed-grid-col">
                    <img class="mx-auto" src="{{ asset('img/risetdata.png') }}" style="height: 90px;  width: 90px;"
                        alt="Berbasis data" loading="lazy">
                    <h6 class="title mt-3 ">Berbasis Data</h6>
                    <p class="">
                        Pantau seluruh data penjualan dan pelanggan.
                        Buat keputusan terbaik setiap saat.
                    </p>
                </div>
            </div>
        </div>

        {{-- Carousel fitur --}}
        <div class="container my-3" id="features">
            <h2 style="text-align: center; font-weight: bolder;">Fitur DMS Omni-Channel</h2>
            <div class="row justify-content-center mt-2">
                <div class="col">
                    <div id="carouselExampleCaptions" class="carousel slide carousel-dark" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                                aria-label="Slide 4"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                                aria-label="Slide 5"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('img/katalog.png') }}" class="d-block w-75 mx-auto"
                                    alt="katalog">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/pesanan.png') }}" class="d-block w-75 mx-auto"
                                    alt="pesanan">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/persediaan.png') }}" class="d-block w-75 mx-auto"
                                    alt="persediaan">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/gudang.png') }}" class="d-block w-75 mx-auto"
                                    alt="persediaan">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/akuntansi.png') }}" class="d-block w-75 mx-auto"
                                    alt="persediaan">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- FAQ --}}
        <div class="container mt-2" id="faq">
            <h2 style="text-align: center; font-weight: bolder;">FAQs</h2>
            <div class="row justify-content-center mt-3">
                <div class="col-sm-8">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    1. Aplikasi ini ditujukan untuk siapa ?
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body" style="margin-left: 16px">
                                    Untuk pengguna aplikasi lazada, khususnya untuk <strong>lazada seller</strong>.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseTwo">
                                    2. Bagaimana cara menggunakan aplikasi ini ?
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body" style="margin-left: 16px">
                                    Pertama harus melakukan registrasi akun pada website ini kemudian masuk ke akun
                                    lazada seller.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseThree">
                                    3. Bagaimana cara registrasi pada website ini ?
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body" style="margin-left: 16px">
                                    Registrasi dapat dilakukan dengan menekan tombol <strong>register</strong>.
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour"
                                        aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                        4. Bagaimana cara melakukan input produk ?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingFour">
                                    <div class="accordion-body" style="margin-left: 16px">
                                        Input produk dapat dilakukan dengan mekanisme sebagai berikut :
                                        <br>
                                        <strong>Pilih kategori --> pilih sub kategori --> pilih kategori
                                            spesifik</strong>.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive"
                                        aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                                        5. Apakah website ini aman digunakan ?
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingFive">
                                    <div class="accordion-body" style="margin-left: 16px">
                                        Kami dapat memastikan bahwa website ini <strong>100 %</strong> aman untuk
                                        digunakan.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Thanks to --}}
            <div class="container mt-4">
                <h2 style="text-align: center; font-weight: bolder;">Special Thanks</h2>
                <hr class="w-50 mx-auto">
                <div class="row justify-content-center align-items-center">
                    <div class="col-2">
                        <img src="{{ asset('img/logokm.png') }}" class="img-fluid" alt="kampus merdeka"
                            loading="lazy">
                    </div>
                    <div class="col-2">
                        <img src="{{ asset('img/logose.png') }}" class="img-fluid" alt="kampus merdeka"
                            loading="lazy">
                    </div>
                    <div class="col-2">
                        <img src="{{ asset('img/logolazada.png') }}" class="img-fluid" alt="kampus merdeka"
                            loading="lazy">
                    </div>
                </div>
                <hr class="w-50 mx-auto">
            </div>

            {{-- Teams --}}
            <div class="container my-4">
                <h2 style="text-align: center; font-weight: bolder;">Our Teams</h2>
                <div class="row justify-content-center mt-3">
                    <div class="col-6 col-md-3">
                        <div class="card text-center">
                            <img src="{{ asset('img/timrohmat.jpg') }}" class="card-img-top img-fluid w-75 mx-auto"
                                alt="rohmat" loading="lazy">
                            <div class="card-body p-0 mt-2">
                                <h5 class="card-title mb-0 fw-bold">Rohmat Syamsul Huda</h5>
                                <p class="card-text mb-1">Universitas Nusantara PGRI Kediri</p>
                                <hr class="m-0">
                                <p class="card-text">Backend</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card text-center">
                            <img src="{{ asset('img/timdwi.png') }}" class="card-img-top img-fluid w-75 mx-auto"
                                alt="rohmat" loading="lazy">
                            <div class="card-body p-0 mt-2">
                                <h5 class="card-title mb-0 fw-bold">Dwi Nugraha</h5>
                                <p class="card-text mb-1">STMIK Amik Riau</p>
                                <hr class="m-0">
                                <p class="card-text">Frontend</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card text-center">
                            <img src="{{ asset('img/timfadil.png') }}" class="card-img-top img-fluid w-75 mx-auto"
                                alt="rohmat" loading="lazy">
                            <div class="card-body p-0 mt-2">
                                <h5 class="card-title mb-0 fw-bold">Fadhil Zuhairsyah</h5>
                                <p class="card-text mb-1">Universitas Sumatera Utara</p>
                                <hr class="m-0">
                                <p class="card-text">Frontend</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card text-center">
                            <img src="{{ asset('img/timputri.png') }}" class="card-img-top img-fluid w-75 mx-auto"
                                alt="rohmat" loading="lazy">
                            <div class="card-body p-0 mt-2">
                                <h5 class="card-title mb-0 fw-bold">Azzah Oktavian Putri K.</h5>
                                <p class="card-text mb-1">Universitas Dinamika</p>
                                <hr class="m-0">
                                <p class="card-text">Frontend</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Site footer -->
    <footer class="site-footer" id="about">
        <div class="container-md">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>Digital Multisite </h6>
                    <p class="text-justify">Digital Multisite adalah layanan dengan menggunakan berbagai channel
                        yang
                        dijadikan strategi perusahaan untuk meningkatkan kepuasan pelanggan, penjualan perusahaan,
                        dan
                        kebutuhan perusahaan lainnya. Digital Multisite adalah metode integratif antara hubungan
                        pelanggan dengan perusahaan.</p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Features</h6>
                    <ul class="footer-links">
                        <li><a style="text-decoration: none;">Katalog</a></li>
                        <li><a style="text-decoration: none;">Pesanan</a></li>
                        <li><a style="text-decoration: none;">Persediaan</a></li>
                        <li><a style="text-decoration: none;">Manajemen Gudang</a></li>
                        <li><a style="text-decoration: none;">Akuntansi</a></li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Contact Us</h6>
                    <ul class="footer-links">
                        <li><i class="fa-solid fa-phone">&nbsp;&nbsp;</i>+6281-123-321-xxx</li>
                        <li><i class="fa-solid fa-envelope">&nbsp;&nbsp;</i>dms@gmail.com</li>
                        <li><i class="fa-solid fa-location-dot">&nbsp;&nbsp;</i>DKI Jakarta</li>
                    </ul>
                </div>
            </div>
            <h6 style="color: #fff;">FIND US ON MAPS</h6>
            <iframe title="MAP"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253840.65295200603!2d106.6894286393006!3d-6.229386696738052!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1654852452391!5m2!1sid!2sid"
                style="width: 100%; height: 195px;" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
            <hr>

            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2022 All Rights Reserved by PT Digital Multisite
                        Indonesia.
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </footer>

    <script src="{{ asset('/js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/ff1fe4e774.js" crossorigin="anonymous"></script>
</body>

</html>
